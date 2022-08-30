<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Mail\ToUserMail;
use Illuminate\Support\Facades\Mail;

use App\Models\User;

class MailController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('teacher.email.index',compact('users'));
    }

    public function confirm(Request $request)
    {
        $confirm_user = User::find($request->id);
        $result = [];
        $result['body'] = $request->body;

        return view('teacher.email.confirm', compact('confirm_user','result'));
    }

    public function send(Request $request)
    {

        if ($request->has(['email', 'body'])) {
            $email = $request->email;
            $body = $request->body;
        }

        Mail::to($email)->send(new ToUserMail($body));

        return view('teacher.email.done');
    }
}
