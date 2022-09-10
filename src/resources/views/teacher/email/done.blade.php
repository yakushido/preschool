@extends('teacher.layouts.default')
@section('contents')

<link rel="stylesheet" href="{{ asset('css/mail.css') }}">

<div class="mail_done">

  <h3>送信完了フォーム</h3>

  <div>
    <h4>送信が完了しました。</h4>
  
    <div>
      <a href="/teacher/dashboard">戻る</a>
    </div>
  </div>

</div>

@endsection