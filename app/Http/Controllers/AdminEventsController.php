<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AdminEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $events = Event::orderBy('id', 'DESC')->get();
        return view('admin.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required',
            'file' => 'required',
            'date' => 'required',
            'location' => 'required',
            'detail' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.event.create')
                ->withErrors($validator)
                ->withInput();
        }

        if ($file = $request->file('file')) {

            $str = $file->getClientOriginalName();
            $str = str_replace(' ', '_', $str);

            $namef = time() . $str;

            $file->move('eventimg', $namef);
        }

        $product = new Event([
            "title" => $request->title,
            "detail" => $request->detail,
            "location" => $request->location,
            "file" => $namef,
            "date" => $request->date,
        ]);
        $product->save();

        $prod = $product->id;

        return redirect('/admin/event');
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
        $event = Event::findOrFail($id);
        return view('admin.event.edit', compact('event'));
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
        $product = Event::findOrFail($id);

        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required',
            'date' => 'required',
            'location' => 'required',
            'detail' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.event.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        if ($file = $request->file('file')) {

            $str = $file->getClientOriginalName();
            $str = str_replace(' ', '_', $str);

            $namef = time() . $str;

            $file->move('eventimg', $namef);

            if ($product->file != '/eventimg/') {
                unlink(public_path() . $product->file);
            }
            $product->update([
                "file" => $namef,
            ]);
        }

        $product->update([
            "title" => $request->title,
            "detail" => $request->detail,
            "location" => $request->location,
            "date" => $request->date,
        ]);

        return redirect('/admin/event');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Event::findOrFail($id);

        if ($product->file == '/eventimg/') {
        } else {

            if (file_exists(public_path() . $product->file)) // make sure it exits inside the folder
            {
                unlink(public_path() . $product->file);
            }
        }
        $product->delete();

        return Redirect::back();
    }
}
