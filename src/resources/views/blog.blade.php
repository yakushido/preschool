@extends('layouts.default')
@section('contents')
<link rel="stylesheet" href="{{ asset('css/blog.css') }}">

  <div class="blog">
    <h2 class='blog_title'>{{ $single_blog['title'] }}</h2>
    <div class="blog_img">
      <img src="{{ Storage::url($single_blog->img_path) }}" alt="ブログimage">
    </div>
    <p class='blog_content'>{{ $single_blog['content'] }}</p>
  </div>

@endsection