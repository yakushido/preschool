@extends('teacher.layouts.default')
@section('contents')

@if(app('env') == 'production')
<link rel="stylesheet" href="{{ secure_asset('css\mail.css') }}">
@else
<link rel="stylesheet" href="{{ asset('css/mail.css') }}">
@endif

  <div class="mail">

    <h3>メール送信フォーム</h3>

    <form method="post" action="/teacher/mail/send">
      @csrf
      <div>
        <input type="hidden" name="name" value="{{ $confirm_user['name'] }}">
        <label>名前：</label>
        <p>{{ $confirm_user['name'] }}</p>
      </div>
      <div>
        <input type="hidden" name="email" value="{{ $confirm_user['email'] }}">
        <label>宛先：</label>
        <p>{{ $confirm_user['email'] }}</p>
      </div>
      <div>
        <input type="hidden" name="body" value="{{ $result['body'] }}">
        <label>本文：</label>
        <p>{{ $result['body'] }}</p>
      </div>
      <div class="button">
        <button>送信</button>
      </div>
    </form>

  </div>
@endsection