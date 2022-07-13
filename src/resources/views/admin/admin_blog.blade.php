@extends('admin.admin_layouts.admin_default')
@section('admin_content')
<link rel="stylesheet" href="{{ asset('css/admin_blog.css') }}">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script>
    $(function(){
        $('.fileinput').on('change', function(){
            let file = $(this).prop('files')[0];
            $('.filelabel').text(file.name);
        });
    });
</script>

<div class="admin_blog">
    <h1>ブログ管理画面</h1>
    <div>
        <div class="admin_blog_add">
            <form action="{{ route('admin.blog.add') }}" method=POST enctype="multipart/form-data">
            @csrf
                <div>
                    <h2>タイトル</h2>
                    <input type="text" name="title">
                </div>
                <div>
                    <h2>本文</h2>
                    <textarea name="content"></textarea>
                </div>
                <div>
                    <h2>写真</h2>
                    <div class="admin_blog_add--file">
                        <label for="file" class="filelabel">ファイルを選択</label><input type="file" name="image" id="file" class="fileinput">
                    </div>
                </div>
                <div class="admin_blog_add--btn">
                    <button>投稿する</button>
                </div>
            </form>
        </div>
        
        <div class="admin_blog_card">
            @foreach($blogs as $blog)
                <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST">
                @csrf
                    <div>
                        <div class="admin_blog_card_img">
                            <img src="{{ Storage::url($blog->img_path) }}" alt="ブログimage">
                        </div>
                        <div class="admin_blog_card_content">
                            <input type="text" name="title" value="{{ $blog['title'] }}">
                            <textarea name="content">{{ $blog['content'] }}</textarea>
                        </div>
                    </div>
                    <div class="admin_blog_card--btn">
                        <button>更新</button>
                    </div>
                </form>
            @endforeach
            {{ $blogs->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
    

@endsection