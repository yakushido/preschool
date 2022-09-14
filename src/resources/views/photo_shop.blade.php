@extends('layouts.default')
@section('contents')

@if(app('env') == 'production')
<link rel="stylesheet" href="{{ secure_asset('css\photo.css') }}">
@else
<link rel="stylesheet" href="{{ asset('css/photo.css') }}">
@endif

<div class="photo_shop">

    <h3>購入フォーム</h3>

    <div class="photo_shop_response_flex">
    
        <img src="{{  Storage::url($gallery['img_path'])  }}" alt="クラスimage">

        <div class="photo_shop_response">

            <div class="photo_history">
                <h4>購入回数：{{ $history_count }}</h4>
            </div>

            <form action="{{ asset('pay') }}" method="POST" class="photo_shop_form">
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

    </div>

</div>

@endsection