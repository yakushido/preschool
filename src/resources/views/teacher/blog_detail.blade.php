@extends('teacher.layouts.default')
@section('contents')

<div class="blog_detail">
    <form action="{{ route('teacher.blog.update',$blog_detail['id']) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">タイトル：</label>
            <input type="text" name="title" value="{{ $blog_detail['title'] }}">
        </div>
        <div>
            <label for="content">内容：</label>
            <input type="text" name="content" value="{{ $blog_detail['content'] }}">
        </div>
        <div>
            <label for="img_path">写真：</label>
            <input type="file" name="img_path" value="{{ Storage::url($blog_detail['img_path']) }}">
        </div>
        <div>
            <button>変更</button>
        </div>
    </form>
</div>

@endsection