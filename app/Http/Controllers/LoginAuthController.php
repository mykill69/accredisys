<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginAuthController extends Controller
{
    public function getLogin()
    {
        return view('login.login');
    }
    
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $validatedAdmin = auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($validatedAdmin) {
            $route = (auth()->user()->role == "Administrator") || (auth()->user()->role == "staff") ? 'home' : 'home';
            return redirect()->route($route)->with('success', 'Login Successfully');
        }else {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }
    }

    public function logout()
    {
        if (auth()->check()) {
            auth()->logout();
            return redirect()->route('getLogin')->with('success', 'You have been Successfully Logged Out');
        } else {
            return redirect()->route('home')->with('error', 'No authenticated user to log out');
        }
    }
}
