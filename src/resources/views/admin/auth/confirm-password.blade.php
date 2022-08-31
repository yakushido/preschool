@extends('admin.layouts.default')
@section('contents')

<div>

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('admin.password.confirm') }}">
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