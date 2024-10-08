<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AdminBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('id', 'DESC')->Paginate(10);
        return view('admin.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book.create');
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
            'a_name' => 'required',
            'file' => 'required',
            'b_name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.book.create')
                ->withErrors($validator)
                ->withInput();
        }

        if ($file = $request->file('file')) {

            $str = $file->getClientOriginalName();
            $str = str_replace(' ', '_', $str);

            $name = time() . $str;

            $file->move('book', $name);

            $input['file'] = "$name";

        }

        Book::create($input);
        return redirect('/admin/book');
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
        $book = Book::findOrFail($id);
        return view('admin.book.edit', compact('book'));
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
        $push = Book::findOrFail($id);

        $input = $request->all();

        $validator = Validator::make($input, [
            'a_name' => 'required',
            'b_name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.book.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        if ($file = $request->file('file')) {

            $str = $file->getClientOriginalName();
            $str = str_replace(' ', '_', $str);

            $name = time() . $str;

            $file->move('book', $name);

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
        return redirect('/admin/book');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $push = Book::findOrFail($id);
        if ($push->file == '/book/') {
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

    public function deleteBooksAll(Request $request)
    {
        $ids = $request->ids;
        $single_id = explode(",", $ids);
        foreach ($single_id as $id) {
            $i = Book::findOrFail($id);
            if ($i->file == '/book/') {
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

    public function bookActive($id)
    {
        $book = Book::where('id', $id)->first();
        if ($book->is_show == 1) {
            $book->is_show = 0;
        } else {
            $book->is_show = 1;
        }
        $book->save();
        return redirect()->back();
    }
}
