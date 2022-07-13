<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;

class HomeController extends Controller
{
    public function show()
    {
        $blogs = Blog::paginate(4);
        return view('index', compact('blogs'));
    }
}
