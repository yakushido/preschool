@extends('admin.layouts.auth_default')
@section('contents')

<link rel="stylesheet" href="{{ asset('css/verify_email.css') }}">

<div class="verify_email">

    <h3 class="form_title">メール認証フォーム</h3>

    <div class="verify_email_form">

        <div class="form_sentence">
            <p>サインアップありがとうございます。</br>メールをお送りしていますので、記載されているリンクをクリックして、メールアドレスの確認をしてください。</br>もしメールが届いていない場合は、再度お送りします。</p>
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="alert">
                <p>頂いたメールアドレスに、新しい認証リンクが送信されました。</p>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.verification.send') }}">
            @csrf

            <div class="button">
                <button>認証メール再送信</button>
            </div>
        </form>

    </div>

</div>

@endsection
