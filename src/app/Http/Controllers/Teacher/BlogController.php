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

        return view('teacher.blog',compact('blog_lists'));
    }

    public function add(BlogRequest $request)
    {
        $img = $request->file('img_path');

        $path = $img->store('img','public');

        Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'img_path' => $path
        ]);

        return redirect()->route('teacher.blog');
    }

    public function delete($id)
    {
        $blog_delete = Blog::find($id);

        $blog_delete->delete();
        Storage::disk('public')->delete($blog_delete->img_path);

        return redirect()->route('teacher.blog');
    }

    public function teacher_detail($id)
    {
        $blog_detail = Blog::find($id);

        return view('teacher.blog_detail',compact('blog_detail'));
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

        return redirect()->route('teacher.blog');
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
