@extends('admin.admin_layouts.admin_default')
@section('admin_content')
<link rel="stylesheet" href="{{ asset('css/admin_blog.css') }}">

    <div class="admin_blog">
        <div class="admin_blog_add">
            <form action="{{ route('admin.blog.add') }}" method=POST enctype="multipart/form-data">
            @csrf
                <div>
                    <h2>タイトル</h2>
                    <input type="text" name="title">
                </div>
                <div>
                    <h2>本文</h2>
                    <input type="text" name="content">
                </div>
                <div>
                    <h2>写真</h2>
                    <input type="file" name="image">
                </div>    
                <button>投稿する</button>
            </form>
        </div>

        @foreach($blogs as $blog)
        <div class="admin_blog_card">
            <div>
                <img src="{{ Storage::url($blog->img_path) }}" alt="ブログimage">
            </div>
            <h2>{{ $blog['title'] }}</h2>
            <p>{{ $blog['content'] }}</p>
        </div>
        @endforeach
    </div>

@endsection