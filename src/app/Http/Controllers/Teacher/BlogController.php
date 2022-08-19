<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blog_lists = Blog::orderBy('created_at','desc')-> paginate(4);

        return view('teacher.blog',compact('blog_lists'));
    }

    public function add(Request $request)
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
}
