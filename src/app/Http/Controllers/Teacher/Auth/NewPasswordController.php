<?php

namespace App\Http\Controllers\Teacher\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use App\Http\Requests\auth\PasswordResetRequest;

class NewPasswordController extends Controller
{
    public function create(Request $request)
    {
        return view('teacher.auth.reset-password', ['request' => $request]);
    }

    public function store(PasswordResetRequest $request)
    {
        $status = Password::broker('teachers')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('teacher.login')
                    : back()->withInput($request->only('email'));
    }
}
