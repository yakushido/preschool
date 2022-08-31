@extends('admin.layouts.default')
@section('contents')

<div>

    <h2>管理者用ログインフォーム</h2>

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

    <form method="POST" action="{{ route('admin.login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email">メールアドレス：

            <input id="email" type="email" name="email" :value="old('email')" autofocus />
        </div>

        <!-- Password -->
        <div>
            <label for="password">パスワード：

            <input id="password"
                            type="password"
                            name="password"
                            autocomplete="current-password" />
        </div>

        <div>
            @if (Route::has('admin.password.request'))
                <a href="{{ route('admin.password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button>Log in</button>
        </div>
    </form>

</div>

@endsection

