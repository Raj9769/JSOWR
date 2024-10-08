<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AdminMusicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $musics = Music::orderBy('id', 'DESC')->Paginate(10);
        return view('admin.music.index', compact('musics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.music.create');
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
            's_name' => 'required',
            'm_name' => 'required',
            'file' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.music.create')
                ->withErrors($validator)
                ->withInput();
        }
        if ($file = $request->file('file')) {

            $str = $file->getClientOriginalName();
            $str = str_replace(' ', '_', $str);

            $name = time() . $str;

            $file->move('music', $name);

            $input['file'] = "$name";

        }

        Music::create($input);
        return redirect('/admin/music');
        // Session::flash('message', "Image Save Successfully");
        // return Redirect::back();
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
        $music = Music::findOrFail($id);
        return view('admin.music.edit', compact('music'));
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
        $push = Music::findOrFail($id);

        $input = $request->all();

        $validator = Validator::make($input, [
            's_name' => 'required',
            'm_name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.music.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        if ($file = $request->file('file')) {

            $str = $file->getClientOriginalName();
            $str = str_replace(' ', '_', $str);

            $name = time() . $str;

            $file->move('music', $name);

            $input['file'] = "$name";

            if (file_exists(public_path() . $push->file)) // make sure it exits inside the folder
            {
                unlink(public_path() . $push->file);
            }

            // unlink(public_path() . $push->file);
        }
        //  return $input;
        $push->update($input);
        // return Redirect::back();
        return redirect('/admin/music');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $push = Music::findOrFail($id);
        if ($push->file == '/music/') {
            $push->delete();
        } else {

            if (file_exists(public_path() . $push->file)) // make sure it exits inside the folder
            {
                unlink(public_path() . $push->file);
            }

            // unlink(public_path() . $push->file);
            $push->delete();
        }

        return Redirect::back();
    }

    public function deleteMusicsAll(Request $request)
    {
        $ids = $request->ids;
        $single_id = explode(",", $ids);
        foreach ($single_id as $id) {
            $i = Music::findOrFail($id);
            if ($i->file == '/music/') {
            } else {

                if (file_exists(public_path() . $i->file)) // make sure it exits inside the folder
                {
                    unlink(public_path() . $i->file);
                }
                // unlink(public_path() . $i->file);
            }
            $i->delete();
        }
        return response()->json(['success' => "Deleted successfully."]);
    }

    public function musicActive($id)
    {
        $music = Music::where('id', $id)->first();
        if ($music->is_show == 1) {
            $music->is_show = 0;
        } else {
            $music->is_show = 1;
        }
        $music->save();
        return redirect()->back();
    }
}
