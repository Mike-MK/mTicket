<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request){
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
        if (!auth()->attempt(['username' => $request->username,'password' => $request->password],$request->remember))
        {
            return back()->with('error_message','Invalid credentials');
        }
        
        return redirect()->route('dashboard');
    }
}