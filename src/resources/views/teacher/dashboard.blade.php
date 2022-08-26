@extends('teacher.layouts.default')
@section('contents')

<div>
    <h2>教員用ページ</h2>
</div>



<div class="mail">
    <!-- <a href="/teacher/mail">メールの送信はこちらから</a> -->
    <a href="/teacher/blog">ブログの追加はこちら</a>
    <a href="/teacher/photo">写真の追加はこちら</a>
    <a href="/teacher/event">イベントの追加はこちら</a>
    <a href="{{ route('calendar') }}">test</a>
</div>





@endsection