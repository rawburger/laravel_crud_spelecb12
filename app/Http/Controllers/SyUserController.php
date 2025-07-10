<?php

namespace App\Http\Controllers;

use App\Models\SyUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SyUserController extends Controller
{
    public function login() 
    {
        if(Auth::check()) {
            return redirect()->route('products.index')->with('success', 'Login!');
        }
        
        return view('users.login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'Logout!');
    }

    public function authenticate(Request $request) 
    {
        $valid = $request->validate([
            'username' => 'required|min:5',
            'password' => 'required|min:7',
        ]);

        if(Auth::attempt(['username'=>$request->username,'password'=>$request->password])) {
            $request->session()->regenerate();

            return redirect()->intended(route('products.index'));
        }

        return redirect()->back()->withErrors(['username'=>'Username does not exist in the system!',])->onlyInput('username');
    }

    public function store(Request $request)
    {
        
        $valid = $request->validate([
            'username' => 'required|min:5',
            'password' => 'required|min:7',
            'password_confirm' => 'required|confirmed:password'
        ]);

        SyUsers::create([
            'username'=>$request->username,
            'password'=>bcrypt($request->password),
        ]);

        return redirect()->back()->withSuccess('User has been added successfully!')->onlyInput('username');
    }

    public function register()
    {
        return view('users.register');
    }

}
