<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function index()
    {
        $team_lists = Team::all();

        $photo_lists = Photo::orderBy('created_at','desc')->paginate(4);

        return view('teacher.photo',compact('team_lists','photo_lists'));
    }

    public function add(Request $request)
    {
        $img = $request->file('img_path');

        $path = $img->store('img','public');

        Photo::create([
            'team_id' => $request->team_id,
            'img_path' => $path
        ]);

        return redirect()->route('teacher.photo');
    }

    public function delete($id)
    {
        $photo_delete = Photo::find($id);

        $photo_delete->delete();

        return redirect()->route('teacher.photo');
    }
}
