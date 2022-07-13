@extends('layouts.default')
@section('contents')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <img src="/storage/preschool.jpg" alt="保育園image">
    
    <div class="blog">
        <h2>毎日ブログ</h2>
        <div>
            <p>このブログでは､その日の給食画像や出来事を毎日アップしています</p>
            <div class="blog_card">
                @foreach($blogs as $blog)
                <a class="blog_card_item" href="/blog/{{ $blog->id }}">
                    <h3>{{ $blog['title'] }}</h2>
                    <img src="{{ Storage::url($blog->img_path) }}" alt="ブログimage">
                </a>
                @endforeach
            </div>
            {{ $blogs->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <div class='attendance'>
        <a href="/attendance">こちらからお休みの連絡ができます</a>
    </div>
@endsection