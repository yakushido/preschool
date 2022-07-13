<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login_show()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        if (Auth::guard('user')->attempt([
            'email' => $request['email'],
            'password' => $request['password']
        ])) {
            return redirect()->route('mypage.show');
        } else {
            return redirect()->route('login.show');
        }
    }
}
