<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(){
        return view('user.login');
    }

    public function auth(Request $request) {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
           return redirect()->route('admin.dashboard');
        }

         // Redirect back with an error if login fails
         return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function dashboard(){
        return view('user.dashboard');
    }

    public function guests(){
        return view('user.guestlist');
    }

    public function plusone(){
        // return view('user.dashboard');
        return 'plusone';
    }

    public function attendance(){
        // return view('user.dashboard');
        return 'attendance';
    }

    public function admins(){
        return 'admins';
        // return view('user.dashboard');
    }



    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login.form');
    }
}


