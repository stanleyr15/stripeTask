@extends('layouts.master')
@section('title.Product Page')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            
                <div class="container">
                    <div class="row row-cols-2 row-cols-lg-5 g-2 g-lg-3" style="margin: 2%;"> 
                        
                        @foreach($products as $product)
                        <div class="col">
                            <div class="p-3 border bg-light">
                                <h5 class="card-title">{{$product['name']}}</h5>
                                <p class="card-text">price - Rs.{{$product['price']}}</p>
                                <a href="/productDetail/{{$product['id']}}" class="btn btn-dark" role="button" aria-pressed="true">Buy Now</a>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

        </div>
    </div>
</div>

@endsection