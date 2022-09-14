@extends('teacher.layouts.auth_default')
@section('contents')

@if(app('env') == 'production')
<link rel="stylesheet" href="{{ secure_asset('css\login.css') }}">
@else
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endif

<div class="login">
    
    <h3 class="form_title">教員用ログインフォーム</h3>

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

        <form method="POST" action="{{ route('teacher.login') }}">
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
                @if (Route::has('teacher.password.request'))
                    <a href="{{ route('teacher.password.request') }}">
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