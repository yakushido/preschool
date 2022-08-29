@extends('layouts.default')
@section('contents')

<div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div>
        <label>タイトル：</label>
        <h3>{{ $blog_detail['title'] }}</h3>
    </div>
    <div>
    <img src="{{ Storage::url($blog_detail['img_path']) }}" alt="ブログimage">
    </div>
    <div>
        <label>内容：</label>
        <p>{{ $blog_detail['content'] }}</p>
    </div>
    
    <div>
        @if( $evaluation === null )
        <form action="{{ route('evaluation.add',$blog_detail['id']) }}" method="POST">
            @csrf
            <select name="evaluation" >
                <option value="1">☆</option>
                <option value="2">☆☆</option>
                <option value="3">☆☆☆</option>
                <option value="4">☆☆☆☆</option>
                <option value="5">☆☆☆☆☆</option>
            </select>
            @if( Auth::check() )
            <button>評価する</button>
            @elseif( !Auth::check() )
            <div>
                <a href="/login">評価するにはログインしてください</a>
            </div>
            @endif
        </form>
        @else
        <form action="{{ route('evaluation.update',$evaluation['id']) }}" method="POST">
            @csrf
            <select name="evaluation" >
                <option value="1">☆</option>
                <option value="2">☆☆</option>
                <option value="3">☆☆☆</option>
                <option value="4">☆☆☆☆</option>
                <option value="5">☆☆☆☆☆</option>
            </select>
            @if( Auth::check() )
            <button>変更する</button>
            @elseif( !Auth::check() )
            <div>
                <a href="/login">評価するにはログインしてください</a>
            </div>
            @endif
        </form>
        @endif
    </div>
</div>

@endsection 