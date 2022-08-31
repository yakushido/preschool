@extends('admin.layouts.default')
@section('contents')

<div>

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

    <form method="POST" action="{{ route('admin.password.update') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <label for="email">メールアドレス：

            <input id="email" type="email" name="email" :value="old('email', $request->email)" autofocus />
        </div>

        <!-- Password -->
        <div>
            <label for="password">新しいパスワード：

            <input id="password" type="password" name="password">
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation">新しいパスワード（確認用）：

            <input id="password_confirmation"
                                type="password"
                                name="password_confirmation">
        </div>

        <div>
            <button>パスワードリセット</button>
        </div>
    </form>

</div>

@endsection
