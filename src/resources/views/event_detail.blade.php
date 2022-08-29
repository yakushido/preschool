@extends('layouts.default')
@section('contents')

<div>
    <div>
        <h3>イベント名</h3>
        <h4>{{ $event['name'] }}</h4>
    </div>
    <div>
        <h3>イベント内容</h3>
        <p>{{ $event['content'] }}</p>
    </div>
</div>

@endsection