@extends('teacher.layouts.default')
@section('contents')

<link rel="stylesheet" href="{{ asset('css/blog.css') }}">
<link rel="stylesheet" href="{{ asset('css/photo.css') }}">

<div class="blog_create">

    <div class="blog_add"> 

        <h3>ブログの投稿</h3>

        <form action="{{ route('teacher.blog.add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="title">タイトル：</label>
                <input type="text" name="title">
            </div>
            <div>
                <label for="content">内容：</label>
                <textarea name="content" cols="30" rows="10"></textarea>
            </div>
            <div>
                <div>写真：<span class="js-upload-filename">ファイルが未選択です</span></div>
                <label for="img_path" class="filelabel">ファイルを選択
                    <input type="file" name="img_path" id="img_path" class="js-upload-file">
                </label>
            </div>
            <div class="button">
                <button>投稿</button>
            </div>
        </form>
    </div>

    <div class="blog_lists">

        <h3>過去のブログリスト</h3>

        <div>
            @foreach( $blog_lists as $blog_list )
            <div class="blog_list">
                <div class="blog_list_flex">
                    <h3><a href="{{ route('teacher.blog.detail',$blog_list['id'])  }}">{{ $blog_list['title'] }}</a></h3>
                    <form action="{{ route('teacher.blog.delete',$blog_list['id']) }}" method="POST">
                        @csrf
                        <button>
                            <img src="/storage/img/icon_delete.jpg" alt="">
                        </button>
                    </form>
                </div>
                <img src="{{ Storage::url($blog_list['img_path']) }}" alt="">
                <p>{{ $blog_list['content'] }}</p>
            </div>
            @endforeach
        </div>
        {{ $blog_lists->links('pagination::bootstrap-4') }}
    </div>

</div>
@endsection