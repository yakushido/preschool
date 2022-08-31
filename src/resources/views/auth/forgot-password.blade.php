@extends('layouts.default')
@section('contents')

<div>

    <div>
        <p>パスワードをお忘れになりましたか？</br>メールアドレスをお知らせいただければ、パスワード再設定用のリンクをメールでお送りしますので、新しいパスワードをお選びください。</p>
    </div>

    @if (session('status'))
        <div role="alert">
            {{ session('status') }}
        </div>
    @endif

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

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email">メールアドレス：

            <input id="email" type="email" name="email" :value="old('email')" autofocus />
        </div>

        <div>
            <button>パスワード再設定用のリンク</button>
        </div>
    </form>

</div>

@endsection
