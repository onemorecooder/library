<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->only('email', 'password');


        if (Auth::attempt($data)) {
            return Redirect::route('index');
        }

        return back()->withErrors([
            'email' => 'Invalid cosas',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
