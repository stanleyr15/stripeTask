<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Product;

class StripeController extends Controller
{
    public function index(Request $request)
    {
        Auth::loginUsingId([2]); 
        $productId = $request->id;
        $productData =  Product::find($productId);
        return view('stripe', [
            'intent' => Auth::user()->createSetupIntent(),
            'product' => $productData,
        ]);
    }

    public function charge(Request $request)
    {
        Auth::loginUsingId([2]); 
        $user = Auth::user();
        $productData =  Product::find($request->p_id);
        $checkStripeUser =  $user->stripe_id;
        if(empty($checkStripeUser)){
        $stripeCustomer = $user->createAsStripeCustomer();
        }
        $paymentMethod = $user->addPaymentMethod($request->id);
        try {
            $productPrice = $productData->price;
            $payment = $user->charge(round($productPrice), $request->id);
        } catch (Exception $e) {
            return $e;
        }
        return view('productDetail', ['payment' => $payment]);
    }
}
