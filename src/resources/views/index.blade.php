@extends('layouts.default')
@section('contents')
    <div class="index">
        <img src="/storage/preschool.jpg" alt="保育園image">

        <div class="blog">
            @foreach($blogs as $blog)
            <div class="blog__card">
                <h2>{{ $blog['title'] }}</h2>
                <img src="{{ Storage::url($item->img_path) }}" alt="ブログimage">
                <p>{{ $blog['content'] }}</p>
            </div>
            @endforeach
        </div>

    </div>
@endsection