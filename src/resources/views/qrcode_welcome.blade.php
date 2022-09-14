@extends('layouts.default')
@section('contents')

@if(app('env') == 'production')
<link rel="stylesheet" href="{{ secure_asset('css\qrcode.css') }}">
@else
<link rel="stylesheet" href="{{ asset('css/qrcode.css') }}">
@endif

<div class="qrcode_welcome">
    <h3>ホームページのQRコード</h3>
    <div>{{ $qrcode }}</div>
</div>

@endsection