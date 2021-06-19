<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripePaymentController extends Controller
{
        /**
             * success response method.
             *
             * @return \Illuminate\Http\Response
             */
            public function stripe()
            {
                return view('productDetail');
            }
        
            /**
             * success response method.
             *
             * @return \Illuminate\Http\Response
             */
            public function stripePost(Request $request)
            {
                Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
                Stripe\Charge::create ([
                        "amount" => 100 * 100,
                        "currency" => "inr",
                        "source" => $request->stripeToken,
                        "description" => "Test payment from test." 
                ]);
        
                Session::flash('success', 'Payment successful!');
                
                return back();
            }
}
