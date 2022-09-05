@extends('layouts.default')
@section('contents')

<link rel="stylesheet" href="{{ asset('css/blog.css') }}">

<div class="blog">
    @if (session('status'))
        <div class="alert" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="blog_detail">
        <h4>{{ $blog_detail['title'] }}</h4>
        <img src="{{ Storage::url($blog_detail['img_path']) }}" alt="ブログimage">
        <p>{{ $blog_detail['content'] }}</p>
    </div>
    
    <div class="evaluation">
        @if( $evaluation === null )
            @if( Auth::check() )
            <form action="{{ route('evaluation.add',$blog_detail['id']) }}" method="POST" class="evaluation_form">
                @csrf
                <select name="evaluation" >
                    <option value="1">☆</option>
                    <option value="2">☆☆</option>
                    <option value="3">☆☆☆</option>
                    <option value="4">☆☆☆☆</option>
                    <option value="5">☆☆☆☆☆</option>
                </select>
                <button>評価する</button>
            </form>
            @elseif( !Auth::check() )
            <div class="evaluation_login">
                <a href="/login">評価するにはログインしてください</a>
            </div>
            @endif
        @else
            @if( Auth::check() )
            <form action="{{ route('evaluation.update',$evaluation['id']) }}" method="POST" class="evaluation_form">
                @csrf
                <select name="evaluation" >
                    <option value="1">☆</option>
                    <option value="2">☆☆</option>
                    <option value="3">☆☆☆</option>
                    <option value="4">☆☆☆☆</option>
                    <option value="5">☆☆☆☆☆</option>
                </select>
                <button>変更する</button>
            </form>
            @elseif( !Auth::check() )
            <div class="evaluation_login">
                <a href="/login">評価するにはログインしてください</a>
            </div>
            @endif
        @endif
    </div>
</div>

@endsection 