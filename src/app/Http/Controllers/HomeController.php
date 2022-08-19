<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('created_at','desc')-> paginate(4);
        return view('welcome', compact('blogs'));
    }
}
