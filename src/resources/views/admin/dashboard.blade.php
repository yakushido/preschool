@extends('admin.layouts.default')
@section('contents')

<div>
    <h3>管理者用ページ</h3>
</div>

@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<div>
    <a href="/teacher/register">教員の新規登録はここから</a>
</div>

<div>
    <a href="/admin/register">管理者の新規登録はここから</a>
</div>

@endsection

