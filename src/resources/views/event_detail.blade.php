@extends('layouts.default')
@section('contents')

<link rel="stylesheet" href="{{ asset('css/event.css') }}">

<div class="event_detail">

    <h3>イベント詳細フォーム</h3>

    <div>
        <h4>{{ $event['name'] }}</h4>
        <p>{{ $event['content'] }}</p>
    </div>

</div>

@endsection