<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    //
    public function index(){
        // Logic to show the Stripe payment form
        return view('stripe');
    }

    public function charge(Request $request){
      
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

        $charge = $stripe->charges->create([
            'amount' => 5000, // Amount in cents
            'currency' => 'usd',
            'source' => $request->stripeToken, // The token generated by Stripe.js
            'description' => 'Payment for order #1234',
        ]);

        return back()->with('success', 'Payment successful! ');
       
    }

}
