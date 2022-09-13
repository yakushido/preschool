@extends('admin.layouts.auth_default')
@section('contents')

<link rel="stylesheet" href="{{ asset('css/register.css') }}">

<div class="register">

    <h3 class="form_title">管理者用新規登録フォーム</h3>

    <div class="register_form">

        <!-- Validation Errors -->
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="error_li">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.register') }}">
            @csrf

            <!-- Name -->
            <div class="name">
                <div><label for="name" class="name_icon"></div>

                <input id="name" type="text" name="name" :value="old('name')" placeholder="氏名" autofocus />
            </div>

            <!-- Email Address -->
            <div class="mail">
                <div><label for="email" class="mail_icon"></div>

                <input id="email" type="email" name="email" :value="old('email')"  placeholder="メールアドレス">
            </div>

            <!-- Password -->
            <div class="password">
                <div><label for="password" class="password_icon"></div>

                <input id="password"
                                type="password"
                                name="password"
                                placeholder="パスワード"
                                autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="password_confirmation">
                <div><label for="password_confirmation" class="password_confirmation_icon"></div>

                <input id="password_confirmation"
                                type="password"
                                placeholder="パスワード（確認用）"
                                name="password_confirmation">
            </div>

            <div class="button">
                <button>Register</button>
            </div>
        </form>

    </div>

</div>

@endsection
