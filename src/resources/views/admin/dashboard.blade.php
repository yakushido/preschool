@extends('admin.layouts.default')
@section('contents')

<link rel="stylesheet" href="{{ asset('css/admin_dashboard.css') }}">

<div class="dashboard">

    <h3>管理者用ページ</h3>

    <div class="category">

        <div class="category_teacher_create">
            <a href="/teacher/register">
                <img src="{{ asset('img/icon_user.jpg') }}" alt="">
                <span>教員の新規登録</span>
            </a>
        </div>

        <div class="category_admin_create">
            <a href="/admin/register">
                <img src="{{ asset('img/icon_user.jpg') }}" alt="">
                <span>管理者の新規登録</span>
            </a>
        </div>

    </div>

</div>
@endsection

