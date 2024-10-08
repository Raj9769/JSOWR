<?php

namespace App\Http\Controllers;

use App\Models\Galleryimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallerys = Galleryimage::orderBy('id', 'DESC')->Paginate(10);
        return view('admin.galleryimages.index', compact('gallerys'));
        // return view('admin.pushnotification.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galleryimages.create');
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
            'file' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.galleryimage.index')
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();
        if ($file = $request->file('file')) {

            $str = $file->getClientOriginalName();
            $str = str_replace(' ', '_', $str);

            $name = time() . $str;

            $file->move('galleryimg', $name);

            $input['file'] = "$name";

        }

        Galleryimage::create($input);
        Session::flash('message', "Image Save Successfully");
        return redirect('admin/galleryimage');
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
        $gallery = Galleryimage::findOrFail($id);
        return view('admin.galleryimages.edit', compact('gallery'));
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
        $push = Galleryimage::findOrFail($id);

        $input = $request->all();

        if ($file = $request->file('file')) {

            $str = $file->getClientOriginalName();
            $str = str_replace(' ', '_', $str);

            $name = time() . $str;

            $file->move('galleryimg', $name);

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
        return redirect('admin/galleryimage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $push = Galleryimage::findOrFail($id);
        if ($push->file == '/galleryimg/') {
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

    public function deleteGalleryAll(Request $request)
    {
        $ids = $request->ids;
        $single_id = explode(",", $ids);
        foreach ($single_id as $id) {
            $i = Galleryimage::findOrFail($id);
            if ($i->file == '/galleryimg/') {
            } else {
                unlink(public_path() . $i->file);
            }
            $i->delete();
        }
        return response()->json(['success' => "Deleted successfully."]);
    }

    public function galleryActive($id)
    {
        $slider = Galleryimage::where('id', $id)->first();
        if ($slider->is_show == 1) {
            $slider->is_show = 0;
        } else {
            $slider->is_show = 1;
        }
        $slider->save();
        return redirect()->back();
    }
}
