<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Team;
use App\Models\Photo;
use App\Models\History;
use App\Http\Requests\PhotoRequest;

class PhotoController extends Controller
{
    public function index()
    {
        $team_lists = Team::all();

        $photo_lists = Photo::orderBy('created_at','desc')->paginate(4);

        return view('teacher.photo',compact(
            'team_lists',
            'photo_lists'
        ));
    }

    public function add(PhotoRequest $request)
    {
        $img = $request->file('img_path')->getClientOriginalName();
        
        $path = $request->file('img_path')->storeAs('public/img',$img);

        Photo::create([
            'team_id' => $request->team_id,
            'img_path' => $path
        ]);

        return redirect()
            ->route('teacher.photo')
            ->withStatus("追加しました");
    }

    public function delete($id)
    {
        $photo_delete = Photo::find($id);

        $path = $photo_delete['img_path'];

        if ($path !== '') {
            Storage::disk('public')->delete(substr($path,7));
        }

        $photo_delete->delete();

        return redirect()
            ->route('teacher.photo')
            ->withStatus("削除しました");
    }

    public function photo_shop_index($id)
    {
        $gallery = Photo::find($id);
        $history_count = History::where('user_id','=',Auth::id())
            ->where('photo_id',$gallery['id'])
            ->count();

        return view('photo_shop',compact(
            'gallery',
            'history_count'
        ));
    }
}
