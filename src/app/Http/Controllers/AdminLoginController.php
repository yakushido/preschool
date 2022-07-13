<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function login_show()
    {
        return view('admin.admin_login');
    }

    public function login(Request $request)
    {
        if (Auth::guard('admin')->attempt([
            'email' => $request['email'],
            'password' => $request['password']
        ])) {
            return redirect()->route('admin.show');
        } elseif (Auth::guard('teachers')->attempt([
            'email' => $request['email'],
            'password' => $request['password']
        ])) {
            return redirect()->route('teacher.show');
        } else {
            return redirect()->route('admin.login.show');
        }
    }
}
