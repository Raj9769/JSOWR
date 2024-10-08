<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AdminClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('id', 'DESC')->get();
        return view('admin.client.index', compact('clients'));
        // return view('admin.contact.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clients = Client::get();
        foreach ($clients as $val) {
            if ($val->email == $request->email) {
                return redirect()->back()->with('alert', 'Email already exist');
            }
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
            'confirmation_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('signup')
                ->withErrors($validator)
                ->withInput();
        }

        $client = new Client([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "password" => $request->password,
        ]);
        $client->save();

        // $user = Client::where(['email' => $request->email])->first();
        // if (!$user || !($request->password == $user->password)) {
        //     return redirect()->back()->with('alert', 'Username or password is not matched');
        // } else {
        //     $request->session()->put('client', $user);
        //     return redirect('/');
        // }
        return redirect('/site/userlogin');
        // return redirect('/admin/client');
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
        $client = Client::findOrFail($id);
        return view('admin.client.edit', compact('client'));
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
        $clients = Client::get();
        foreach ($clients as $val) {
            if ($val->email == $request->email) {
                return redirect()->back()->with('alert', 'Email already exist');
            }
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.client.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }
        
        $client = Client::findOrFail($id);

        $client->update([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "password" => $request->password,
        ]);

        return redirect('/admin/client');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect('/admin/client');
    }

    public function clientActive($id, $val)
    {
        $client = Client::where('id', $id)->first();
        if ($val == 1) {
            $client->is_approve = 1;
            $client->save();
        }
        if ($val == 0) {
            $client = Client::findOrFail($id);
            $client->delete();
        }
        return redirect()->back();
    }
}
