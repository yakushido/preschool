@extends('layouts.auth_default')
@section('contents')

<link rel="stylesheet" href="{{ asset('css/login.css') }}">

<div class="login">

    <h3 class="form_title">ログインフォーム</h3>

    <div class="login_form">

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

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mail">
                <div><label for="email" class="mail_icon"></div>

                <input id="email" type="email" name="email" :value="old('email')" placeholder="メールアドレス" autofocus />
            </div>

            <!-- Password -->
            <div class="password">
                <div><label for="password" class="password_icon"></div>

                <input id="password"
                                type="password"
                                name="password"
                                placeholder="パスワード"
                                autocomplete="current-password" />
            </div>

            <div class="button">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <div>
                    <button>Log in</button>
                </div>
            </div>
        </form>

    </div>

</div>

@endsection