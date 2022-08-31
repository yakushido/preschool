<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $team_lists = Team::all();

        return view('admin.dashboard',compact(
            'team_lists'
        ));
    }
}
