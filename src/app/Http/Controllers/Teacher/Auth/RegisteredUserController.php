<?php

namespace App\Http\Controllers\Teacher\Auth;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\Team;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\auth\TeacherResisterRequest;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $team_lists = Team::all();

        return view('teacher.auth.register',compact(
            'team_lists'
        ));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function store(TeacherResisterRequest $request)
    {
        $user = Teacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'team_id' => $request->team_id
        ]);

        event(new Registered($user));

        return redirect()
            ->route('admin.dashboard')
            ->withStatus("確認メールを送りました");
    }
}
