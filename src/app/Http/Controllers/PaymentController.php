<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Support\Facades\Auth;
use App\Models\History;

class PaymentController extends Controller
{
    public function pay(Request $request){

        History::create([
            "photo_id" => $request['photo_id'],
            "user_id" => Auth::id()
        ]);

        Stripe::setApiKey(env('STRIPE_SECRET'));
    
        $charge = Charge::create(array(
            'amount' => 100,
            'currency' => 'jpy',
            'source'=> request()->stripeToken,
        ));
        return back()
            ->withStatus("決済が完了しました");
    }
}
