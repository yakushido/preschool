@extends('teacher.layouts.default')
@section('contents')

@if(app('env') == 'production')
<link rel="stylesheet" href="{{ secure_asset('css\blog.css') }}">
<link rel="stylesheet" href="{{ secure_asset('css\photo.css') }}">
@else
<link rel="stylesheet" href="{{ asset('css/blog.css') }}">
<link rel="stylesheet" href="{{ asset('css/photo.css') }}">
@endif

<div class="blog_update">

    <h3>ブログ編集フォーム</h3>

    <form action="{{ route('teacher.blog.update',$blog_detail['id']) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="title">タイトル：</label>
            <input type="text" name="title" value="{{ $blog_detail['title'] }}">
        </div>
        <div>
            <label for="content">内容：</label>
            <textarea name="content" id="" cols="30" rows="10">{{ $blog_detail['content'] }}</textarea>
        </div>
        <div class="blog_update_old_img">
            <label for="">投稿中の写真：</label>
            <img src="{{ Storage::url($blog_detail['img_path']) }}" alt="">
        </div>
        <div class="blog_update_new_img">
            <div>変更する写真：<span class="js-upload-filename">ファイルが未選択です</span></div>
            <label for="img_path" class="filelabel">ファイルを変更する
                <input type="file" name="img_path" id="img_path" class="js-upload-file">
            </label>
        </div>
        <div class="button">
            <button>変更</button>
        </div>
    </form>
</div>

@endsection