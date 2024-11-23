<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(){
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
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
        $totalGuest      = Guest::count();
        $totalPlusOne    = Guest::whereNotNull('added_by')->count();
        $totalAdmin      = User::count();
        $totalComing     = Guest::where('is_coming', '=', true)->count();
        // dd($totalComing);

        return view('user.dashboard', compact('totalGuest', 'totalPlusOne', 'totalAdmin', 'totalComing'));
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
        return redirect()->route('login');
    }
}


