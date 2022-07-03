<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;

class BlogController extends Controller
{
    public function show()
    {
        $blogs = Blog::all();
        return view('admin.admin_blog', compact('blogs'));
    }

    public function add(Request $request)
    {
        if(isset($request->image)){
            $img = $request->file('image');

            $img_path = $img->store('img' , 'public');
            
            Blog::create([
                'title' => $request->title,
                'content' => $request->content,
                'img_path' => $img_path
            ]);
        }else{
            Blog::create([
                'title' => $request->title,
                'content' => $request->content
            ]);
        }

        return redirect()->route('admin.blog');

    }
}
