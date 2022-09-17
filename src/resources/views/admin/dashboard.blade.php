@extends('admin.layouts.default')
@section('contents')

@if(app('env') == 'production')
<link rel="stylesheet" href="{{ secure_asset('css\admin_dashboard.css') }}">
@else
<link rel="stylesheet" href="{{ asset('css/admin_dashboard.css') }}">
@endif

<div class="dashboard">

    <h3>管理者用ページ</h3>

    <div class="category">

        <div class="category_teacher_create">
            <a href="/teacher/register">
                <img src="{{ asset('img/icon_user.jpg') }}" alt="">
                <span>教員の新規登録</span>
            </a>
        </div>

        <div class="category_teacher_edit">
            <a href="/admin/edit_teacher">
                <img src="{{ asset('img/edit_icon.jpg') }}" alt=""> 
                <span>教員の編集</span>
            </a>
        </div>

        <div class="category_admin_create">
            <a href="/admin/register">
                <img src="{{ asset('img/icon_user.jpg') }}" alt="">
                <span>管理者の新規登録</span>
            </a>
        </div>

        <div class="category_admin_edit">
            <a href="/admin/edit_admin">
                <img src="{{ asset('img/edit_icon.jpg') }}" alt="">
                <span>管理者の編集</span>
            </a>
        </div>

    </div>

</div>
@endsection

