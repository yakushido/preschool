<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;

class BlogController extends Controller
{
    public function show()
    {
        $blogs = Blog::paginate(3);
        return view('admin.admin_blog', compact('blogs'));
    }

    public function single_page_show($id)
    {
        $single_blog = Blog::find($id);
        return view('blog',compact('single_blog'));
    }

    public function add(Request $request)
    {
        $img = $request->file('image');
        $img_path = $img->store('img' , 'public');
        
        Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'img_path' => $img_path
        ]);

        return redirect()->route('admin.blog');
    }

    public function update(Request $request, $id)
    {
        $update_blog = Blog::find($id);
        $update_blog->title = $request->input('title');
        $update_blog->content = $request->input('content');
        $update_blog->save();

        return redirect()->route('admin.blog');
    }
}
