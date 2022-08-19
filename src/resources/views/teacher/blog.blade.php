@extends('teacher.layouts.default')
@section('contents')

<div class="blog_add"> 
    <form action="{{ route('teacher.blog.add') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">タイトル：</label>
            <input type="text" name="title">
        </div>
        <div>
            <label for="content">内容：</label>
            <input type="text" name="content">
        </div>
        <div>
            <label for="img_path">写真:</label>
            <input type="file" name="img_path">
        </div>
        <div>
            <button>投稿</button>
        </div>
    </form>
</div>

<div class="blog_lists">
    @foreach( $blog_lists as $blog_list )
    <div>
        <h3>{{ $blog_list['title'] }}</h3>
        <p>{{ $blog_list['content'] }}</p>
        <img src="{{ Storage::url($blog_list['img_path']) }}" alt="">
    </div>
    @endforeach
</div>

@endsection