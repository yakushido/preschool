@extends('teacher.layouts.default')
@section('contents')
<link rel="stylesheet" href="{{ asset('css/teacher/index.css') }}">

  <div class="mail">
    <h3>メール送信フォーム</h3>
    <form method="post" action="{{ route('teacher.mail.confirm') }}">
      @csrf
      <div>
        <label>宛先（必須）：</label>
        <select name="id">
          @foreach( $users as $user)
          <option value="{{ $user['id'] }}">{{ $user['name'] }}</option>
          @endforeach
        </select>
      </div>
      <div>
        <label>本文：</label>
        <textarea name="body" placeholder="本文（100文字まで）をお書きください"  rows="3" >{{old('body')}}</textarea>
      </div>
      <div class="mail_btn">
        <button type="submit">確認</button>
      </div>
    </form>
  </div>

  @endsection