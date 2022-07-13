<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function admin_user_detail_show($id)
    {
        $admin_user = User::find($id);

        return view('admin.admin_user_detail', compact('admin_user'));
    }

    public function user_show()
    {
        $user = User::where('id', Auth::id())->get();

        return view('mypage', compact('user'));
    }
}
