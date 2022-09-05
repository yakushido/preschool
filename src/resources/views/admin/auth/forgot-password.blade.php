@extends('admin.layouts.default')
@section('contents')

<link rel="stylesheet" href="{{ asset('css/forgot_password.css') }}">

<div class="forgot_password">

    <h3 class="form_title">パスワード再設定用のリンク送信フォーム</h3>

    <div class="forgot_password_form">

        <div class="form_sentence">
            <p>パスワードをお忘れになりましたか？</br>メールアドレスをお知らせいただければ、パスワード再設定用のリンクをメールでお送りしますので、新しいパスワードをお選びください。</p>
        </div>

        @if (session('status'))
            <div class="alert" role="alert">
                {{ session('status') }}
            </div>
        @endif

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

        <form method="POST" action="{{ route('admin.password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="mail">
                <div><label for="email" class="mail_icon"></div>

                <input id="email" type="email" name="email" :value="old('email')"  placeholder="メールアドレス">
            </div>

            <div class="button">
                <button>パスワード再設定用のリンク</button>
            </div>
        </form>

    </div>

</div>

@endsection
