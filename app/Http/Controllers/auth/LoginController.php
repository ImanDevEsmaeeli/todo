<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function view()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
            return redirect()->route('task.index');
        }
        return  redirect()->back()->withInput($request->only('email','remember'))->withErrors([
            'email' => 'These credentials do not math our records'
        ]);
    }
}
