<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Http\Requests\auth\ForgotPasswordRequest;

class PasswordResetLinkController extends Controller
{
    public function create()
    {
        return view('admin.Auth.forgot-password');
    }

    public function store(ForgotPasswordRequest $request)
    {
        $status = Password::broker('admins')->sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                    ? back()->withStatus("パスワード再設定用のリンクをメールでお送りしました。")
                    : back()->withInput($request->only('email'));
    }
}
