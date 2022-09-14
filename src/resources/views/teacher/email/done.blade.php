@extends('teacher.layouts.default')
@section('contents')

@if(app('env') == 'production')
<link rel="stylesheet" href="{{ secure_asset('css\mail.css') }}">
@else
<link rel="stylesheet" href="{{ asset('css/mail.css') }}">
@endif

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