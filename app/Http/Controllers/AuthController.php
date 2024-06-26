<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
#register
    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        #user info validation
        $this->validate($request,[
            'name' => ['required'],
            'email' => ['required','email','unique:users'],
            'password' => 'required|confirmed',
        ]);

        #create user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        #sign in user
         Auth::attempt($request->only('email','password'));
        #redirect  user
        return redirect()->route('dashboard');
    }


    #login functions
    public function login()
    {
        return view('auth.login');
    }

    public function user(Request $request)
    {
        #user info validation
        $this->validate($request,[
            'email' => ['required','email'],
            'password' => 'required',
        ]);

        #sign in user
       if ( ! Auth::attempt($request->only('email','password'))) {
        return redirect()->back()->with('status','Invalid Login !');
       }
        #redirect  user
        return redirect()->route('dashboard');
    }

    #logout
    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
