<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Donation;
use App\Models\Event;
use App\Models\Galleryimage;
use App\Models\Music;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function login(Request $req)
    {
        // return $req->input();
        $user = User::where(['username' => $req->username])->first();
        if (!$user || !Hash::check($req->password, $user->password)) {
            return redirect()->back()->with('alert', 'Username or password is not matched');
            // return "Username or password is not matched";
        } else {
            Auth::loginUsingId($user->id);
            $req->session()->put('user', $user);
            return redirect('/admin/dashboard');
        }
    }

    public function userLogincheck(Request $req)
    {
        $user = Client::where(['email' => $req->email])->first();
        if (!$user || !($req->password == $user->password)) {
            return redirect()->back()->with('alert', 'Email or password is not matched');
        } else {
            if ($user->is_approve == 0) {
                return redirect()->back()->with('alert', 'Your account is not approved by admin');
            }
            $req->session()->put('client', $user);
            return redirect('/');
        }
    }

    public function userLogin(Request $req)
    {
        return view('frontend.login');
    }

    public function signup(Request $req)
    {
        return view('frontend.signup');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    public function userLogout(Request $request)
    {
        Session::forget('client');
        return redirect('/');
    }

    public function dashboard()
    {
                $eventlists = Event::get();
        $books = Book::count();
        $gallerys = Galleryimage::count();
        $musics = Music::count();
        $events = Event::count();
        $clients = Client::count();
        $contacts = Contact::count();
        $donationunshow = Donation::where('is_show', 0)->count();
        $donations = Donation::count();
        return view('admin.index', compact('events', 'clients', 'musics', 'gallerys', 'books', 'contacts', 'donationunshow', 'donations','eventlists'));
    }

    public function profiledit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.profile.edit', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $user = Session::get('user');
        if (!(Hash::check($request->get('current-password'), $user->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Your current password does not matches with the password you provided. Please try again.");
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            //Current password and new password are same
            return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Session::get('user');
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success", "Password changed successfully !");

    }

    public function homePage(Request $request)
    {
        // if (!Session::get('client')) {
        //     return view('frontend.login');
        // }
        // if (isset($request->quer)) {
        //     $data = $request->quer;
        //     $products = Product::where('pname', 'like', '%' . $data . '%')->orwhere('pdetail', 'like', '%' . $data . '%')->orWhere('pcompany', 'like', '%' . $data . '%')->orderBy('id', 'DESC')->paginate(20);
        // } else {
        //     $products = Product::orderBy('id', 'DESC')->paginate(20);
        // }
        // $catrgorys = Category::get();
        // return view('frontend.index', compact('products', 'catrgorys'));
        return view('frontend.index');

    }

    public function about(Request $request)
    {
        return view('frontend.about');
    }

    public function event(Request $request)
    {
        $events = Event::get();
        return view('frontend.event', compact('events'));
    }

    public function donation(Request $request)
    {
        return view('frontend.donation');
    }

    public function contact(Request $request)
    {
        return view('frontend.contact');
    }

    public function eventDetail(Request $request, $id)
    {
        if (!Session::get('client')) {
            return view('frontend.login');
        }
        $event = Event::where('id', $id)->first();
        return view('frontend.event-details', compact('event'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

}
