@extends('teacher.layouts.default')
@section('contents')
  <div class="confirm">
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
      <button type="submit">送信</button>
    </form>
  </div>
@endsection