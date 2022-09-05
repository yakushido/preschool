@extends('layouts.default')
@section('contents')

<link rel="stylesheet" href="{{ asset('css/event.css') }}">


<div class="event">
    <h3>{{ $event['name'] }}</h3>
    <p>{{ $event['content'] }}</p>
</div>

@endsection