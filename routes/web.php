<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\StripeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//------Home page route----------------//
Route::get('/', function () {
    return view('index');
});

//------Product page route-------------//
Route::get('/product', [ProductController::class,'productList']);
//------Product detail page route------//
Route::get('/productDetail/{id}', [StripeController::class,'index']);
//------Stripe payment route-----------//
Route::get('stripe/charge', [StripeController::class,'charge'])->name('stripeCharge');
