<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AdminParticipantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($request->event)) {
            $participants = Participant::where('events_id', $request->event)->orderBy('id', 'DESC')->get();
            $kids = Participant::where('events_id', $request->event)->sum('kids');
            $adults = Participant::where('events_id', $request->event)->sum('adults');
        } else {
            $participants = Participant::orderBy('id', 'DESC')->get();
            $kids = Participant::sum('kids');
            $adults = Participant::sum('adults');
        }
        $events = Event::orderBy('id', 'DESC')->get();
        return view('admin.participant.index', compact('participants', 'events', 'kids', 'adults'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.participant.create');
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
            'kids' => 'required',
            'adults' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('eventdetail', $request->events_id)
                ->withErrors($validator)
                ->withInput();
        }

        Participant::create($input);
        return redirect()->back()->with('alert', 'Submit data Successfully');
        // return redirect('admin/participant');
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
        $participant = Participant::findOrFail($id);
        return view('admin.participant.edit', compact('participant'));
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
        $push = Participant::findOrFail($id);
        $input = $request->all();
        $push->update($input);
        return redirect('admin/participant');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $participant = Participant::findOrFail($id);
        $participant->delete();
        return redirect('admin/participant');
    }

    public function myparticipantDeleteAll(Request $request)
    {
        $ids = $request->ids;
        $single_id = explode(",", $ids);
        foreach ($single_id as $id) {
            $i = Participant::findOrFail($id);
            $i->delete();
        }
        return response()->json(['success' => "Deleted successfully."]);
    }
}
