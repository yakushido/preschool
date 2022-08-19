@extends('layouts.default')
@section('contents')

<div>
    @if( Auth::check() )
    <h2>{{ Auth::user()['name'] }} 様</h2>
    @elseif( !Auth::check() )
    <h2><a href="/login">ログインはこちら</a></h2>
    @endif
</div>

<div class="blog">
    <h3>毎日ブログ</h3>
    <div>
        <p>このブログでは､その日の給食画像や出来事を毎日アップしています</p>
        <div class="blog_card">
            @foreach($blogs as $blog)
            <a class="blog_card_item" href="/blog/{{ $blog->id }}">
                <h4>{{ $blog['title'] }}</h4>
                <img src="{{ Storage::url($blog->img_path) }}" alt="ブログimage">
            </a>
            @endforeach
        </div>
        {{ $blogs->links('pagination::bootstrap-4') }}
    </div>
</div>



@endsection