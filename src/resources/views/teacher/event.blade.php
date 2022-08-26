@extends('teacher.layouts.default')
@section('contents')

<link rel="stylesheet" href="{{ asset('css/calendar.css') }}">

<a href="{{ url('/teacher/event?date=' . $calendar->getPreviousMonth()) }}">前の月</a>

	<span>{{ $calendar->getTitle() }}</span>

<a href="{{ url('/teacher/event?date=' . $calendar->getNextMonth()) }}">次の月</a>

<div>{!! $calendar->render() !!}</div>

@endsection