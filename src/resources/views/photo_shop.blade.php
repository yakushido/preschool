@extends('layouts.default')
@section('contents')

<div>
    <h3>購入フォーム</h3>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <img src=" Storage::url($gallery['img_path'])  }}" alt="クラスimage">
    <div>
        <h4>購入回数：{{ $history_count }}</h4>
    </div>
    <form action="{{ asset('pay') }}" method="POST">
        {{ csrf_field() }}
        <input type="text" name="photo_id" value="{{ $gallery['id'] }}" hidden> 
        <script
            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
            data-key="{{ env('STRIPE_KEY') }}"
            data-amount="100"
            data-name="Stripe決済デモ"
            data-label="決済をする"
            data-description="これはデモ決済です"
            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
            data-locale="auto"
            data-currency="JPY">
        </script>
    </form>
</div>

@endsection