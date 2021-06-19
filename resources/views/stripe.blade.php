@extends('layouts.master')
@section('title.Home')
@section('content')
<style>
    .StripeElement {
        box-sizing: border-box;
        height: 40px;
        padding: 10px 12px;
        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }
    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }
    .StripeElement--invalid {
        border-color: #fa755a;
    }
    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
</style> 
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            
                <div class="container">
                    <div class="row row-cols-2 row-cols-lg-2 g-2 g-lg-3" style="margin: 2%;"> 
                        
                        
                        <div class="col">
                            <div class="p-3 border bg-light">
                                <h5 class="card-title">{{$product['name']}}</h5>
                                <p class="card-text">{{$product['description']}}</p>
                                <h5 class="card-title">Enter card details to make payment</h5>
                                <input id="card-holder-name" class="form-control" type="text" Placeholder="Name in your card">
                                <div style="margin:2%;margin-left:0%;" id="card-element"></div>
                                <button id="card-button" class="btn btn-secondary" data-secret="{{ $intent->client_secret }}">
                                    Process Payment
                                </button>
                            </div>
                        </div>
                        

                    </div>
                </div>
        </div>
    </div>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('{{ env('STRIPE_KEY') }}');
    const elements = stripe.elements();
    const cardElement = elements.create('card');
    cardElement.mount('#card-element');
    const cardHolderName = document.getElementById('card-holder-name');
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;
    cardButton.addEventListener('click', async (e) => {
    const { paymentMethod, error } = await stripe.createPaymentMethod(
        'card', cardElement, {
            billing_details: { name: cardHolderName.value }
        }
        );
        if (error) {
            // Display "error.message" to the user...
            alert(error.message);
        } else {
            // The card has been verified successfully...
            let url = "{{ route('stripeCharge', ['id=:id', 'p_id=:p_id']) }}";
            url = url.replace(':id', paymentMethod.id);
            url = url.replace(':p_id', '{{ $product['id'] }}');
            url = url.replace('&amp;', '&');
            document.location.href=url;
        }
    });
</script>
@endsection