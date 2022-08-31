@extends('admin.layouts.default')
@section('contents')

<div>

    <div>
        <p>サインアップありがとうございます。</br>メールをお送りしていますので、記載されているリンクをクリックして、メールアドレスの確認をしてください。</br>もしメールが届いていない場合は、再度お送りします。</p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div>
            {{ __('頂いたメールアドレスに、新しい認証リンクが送信されました') }}
        </div>
    @endif

    <div>
        <form method="POST" action="{{ route('admin.verification.send') }}">
            @csrf

            <div>
                <button>認証メール再送信</button>
            </div>
        </form>

        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf

            <button type="submit">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>

</div>

@endsection
