<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    //List ALL product
    function productList()
    {   
        $productData =  Product::all();
        return view('product',['products' => $productData]);
    }

}
