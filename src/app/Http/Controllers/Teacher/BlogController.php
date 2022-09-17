<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Blog;
use App\Models\Evaluation;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BlogRequest;

class BlogController extends Controller
{
    public function index()
    {
        $blog_lists = Blog::orderBy('created_at','desc')-> paginate(4);

        return view('teacher.blog',compact(
            'blog_lists'
        ));
    }

    public function add(BlogRequest $request)
    {
        $img = $request->file('img_path')->getClientOriginalName();
        
        $path = $request->file('img_path')->storeAs('public/img',$img);

        Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'img_path' => $path
        ]);

        return redirect()
            ->route('teacher.blog')
            ->withStatus("追加しました");
    }

    public function delete($id)
    {
        $blog_delete = Blog::find($id);

        $path = $blog_delete['img_path'];

        if ($path !== '') {
            Storage::disk('public')->delete(substr($path,7));
        }

        $blog_delete->delete();

        return redirect()
            ->route('teacher.blog')
            ->withStatus("削除しました");
    }

    public function teacher_detail($id)
    {
        $blog_detail = Blog::find($id);

        return view('teacher.blog_update',compact(
            'blog_detail'
        ));
    }

    public function update(Request $request, $id)
    {
        $blog_update = Blog::find($id);

        $blog_update['title'] =$request->input('title');
        $blog_update['content'] =$request->input('content');

        if( !empty($request->file('img_path')) ){
            $img = $request->file('img_path');

            $path = $img->store('img','public');

            $blog_update['img_path'] = $path;
        }

        $blog_update->save();

        return redirect()
            ->route('teacher.blog')
            ->withStatus("更新しました");
    }

    public function detail($id)
    {
        $blog_detail = Blog::find($id);
        $evaluation = Evaluation::where('blog_id','=',$id)->where('user_id','=',Auth::id())->first();

        return view('blog_detail',compact(
            'blog_detail',
            'evaluation'
        ));
    }
}
