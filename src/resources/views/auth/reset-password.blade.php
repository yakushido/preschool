@extends('layouts.auth_default')
@section('contents')

<link rel="stylesheet" href="{{ asset('css/reset_password.css') }}">

<div class="reset_password">

    <h3 class="form_title">パスワードリセットフォーム</h3>

    <div class="reset_password_form">

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

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="mail">
                <div><label for="email" class="mail_icon"></div>

                <input id="email" type="email" name="email" :value="old('email', $request->email)" placeholder="メールアドレス" autofocus />
            </div>

            <!-- Password -->
            <div class="password">
                <div><label for="password" class="password_icon"></div>

                <input id="password" type="password" name="password" placeholder="新しいパスワード">
            </div>

            <!-- Confirm Password -->
            <div class="password_confirmation">
                <div><label for="password_confirmation" class="password_confirmation_icon"></div>

                <input id="password_confirmation"
                                    type="password"
                                    placeholder="新しいパスワード（確認用）"
                                    name="password_confirmation">
            </div>

            <div class="button">
                <button>パスワードリセット</button>
            </div>
        </form>

    </div>

</div>

@endsection
