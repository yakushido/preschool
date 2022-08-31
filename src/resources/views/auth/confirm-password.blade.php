@extends('layouts.default')
@section('contents')

<div>

        <div>
            <p>これはアプリケーションの安全な領域です。続行する前にパスワードを確認してください。</p>
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <label for="password">パスワード：

                <input id="password"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div>
                <button>確認</button>
            </div>
        </form>

</div>

@endsection
