<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AdminDonationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donationshow = Donation::where('is_show', 0)->get();
        foreach ($donationshow as $conta) {
            $conta->is_show = 1;
            $conta->save();
        }
        $donations = Donation::orderBy('id', 'DESC')->get();
        return view('admin.donation.index', compact('donations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'username' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'amount' => 'required',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('donation')
                ->withErrors($validator)
                ->withInput();
        }

        Donation::create($input);
        return redirect()->back()->with('alert', 'Submit data Successfully');
        // return redirect('admin/contact');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adslink = Donation::findOrFail($id);
        $adslink->delete();
        // return  Redirect::back();
        return redirect('admin/contact');
    }

    public function mydonationDeleteAll(Request $request)
    {

        $ids = $request->ids;
        $single_id = explode(",", $ids);
        foreach ($single_id as $id) {
            $i = Donation::findOrFail($id);
            $i->delete();
        }
        return response()->json(['success' => "Deleted successfully."]);
    }
}
