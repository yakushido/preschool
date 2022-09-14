@extends('layouts.default')
@section('contents')

@if(app('env') == 'production')
<link rel="stylesheet" href="{{ secure_asset('css\event.css') }}">
@else
<link rel="stylesheet" href="{{ asset('css/event.css') }}">
@endif

<div class="event_detail">

    <h3>イベント詳細フォーム</h3>

    <div>
        <h4>{{ $event['name'] }}</h4>
        <p>{{ $event['content'] }}</p>
    </div>

</div>

@endsection