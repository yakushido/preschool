@extends('teacher.layouts.default')
@section('contents')

<div>

    <h2>教員用ログインフォーム</h2>

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

    <form method="POST" action="{{ route('teacher.login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email">メールアドレス：

            <input id="email" type="email" name="email" :value="old('email')" autofocus />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password">パスワード：

            <input id="password"
                            type="password"
                            name="password"
                            autocomplete="current-password" />
        </div>

        <div>
            @if (Route::has('teacher.password.request'))
                <a href="{{ route('teacher.password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <button>
                {{ __('Log in') }}
            </button>
        </div>
    </form>

</div>

@endsection