@extends('teacher.layouts.default')
@section('contents')

<div class="blog_add"> 

    <h3>ブログの投稿</h3>

    <!-- Validation Errors -->
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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

    <h3>過去のブログリスト</h3>

    @foreach( $blog_lists as $blog_list )
    <div>
        <h3><a href="{{ route('teacher.blog.detail',$blog_list['id'])  }}">{{ $blog_list['title'] }}</a></h3>
        <p>{{ $blog_list['content'] }}</p>
        <img src="{{ Storage::url($blog_list['img_path']) }}" alt="">
    </div>
    <div>
        <form action="{{ route('teacher.blog.delete',$blog_list['id']) }}" method="POST">
            @csrf
            <button>削除</button>
        </form>
    </div>
    @endforeach
    {{ $blog_lists->links('pagination::bootstrap-4') }}
</div>

@endsection