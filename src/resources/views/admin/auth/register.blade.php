@extends('admin.layouts.default')
@section('contents')

<div>

    <h2>管理者用新規登録フォーム</h2>

    <!-- Validation Errors -->
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.register') }}">
        @csrf

        <!-- Name -->
        <div>
            <label for="name">氏名：

            <input id="name" type="text" name="name" :value="old('name')" autofocus>
        </div>

        <!-- Email Address -->
        <div>
            <label for="email">メールアドレス：

            <input id="email" type="email" name="email" :value="old('email')">
        </div>

        <!-- Password -->
        <div>
            <label for="password">パスワード：

            <input id="password"
                            type="password"
                            name="password"
                            autocomplete="new-password" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation">パスワード（確認用）：

            <input id="password_confirmation"
                            type="password"
                            name="password_confirmation">
        </div>

        <div>
            <a href="{{ route('admin.login') }}">
                {{ __('Already registered?') }}
            </a>

            <button>Register</button>
        </div>
    </form>

</div>

@endsection
