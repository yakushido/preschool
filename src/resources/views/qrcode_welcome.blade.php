@extends('layouts.default')
@section('contents')

<link rel="stylesheet" href="{{ asset('css/qrcode.css') }}">

<div class="qrcode_welcome">
    <h3>ホームページのQRコード</h3>
    <div>{{ $qrcode }}</div>
</div>

@endsection