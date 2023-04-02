@extends('index')

@section('content')

<div class="mt-5">
<h1 class="h1 pt-5 text-center">カード情報入力画面</h1>
    <div class="mt-2 d-flex justify-content-center">
        
        <div class="py-12 container-m w-75">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                    <h2>購入</h2>
                        <form id="setup-form" action="{{ route('purchase.post') }}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <input type="hidden" name="event_id" value="{{ $event->id }}">

                            <input id="card-holder-name" type="text" placeholder="カード名義人" name="card-holder-name">
                            <div id="card-element"></div>
                            <button id="card-button" class="card-button">
                                購入
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- お待ちください画面 -->
<div id="wait">
    <div class="wak">
        <div class="icon">@include('back.svg')</div>
        <p>処理しています<br>少々お待ちください</p>
    </div>
</div>
<!-- お待ちください画面ここまで -->


@push('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        const stripe = Stripe('pk_test_51MqYIUBIU0a15NHbJxBBEvnp8QbPc9X1JauhpwOIFCDVk9OuaGCWedz4DZo6ii974VBFisfVWRffk0Ww4tHjV7hc00Zec9N9bO');
        
        const elements = stripe.elements();
        const cardElement = elements.create('card');
        cardElement.mount('#card-element');

        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');

        cardButton.addEventListener('click', async (e) => {
        e.preventDefault()
        const { paymentMethod, error } = await stripe.createPaymentMethod(
                    'card', cardElement, {
                        billing_details: { name: cardHolderName.value }
                    }
                );

            if (error) {
                // Display "error.message" to the user...
                console.log(error);
            } else {
                // The card has been verified successfully...
                stripePaymentIdHandler(paymentMethod.id);
            }
        });

        function stripePaymentIdHandler(paymentMethodId) {
            // Insert the paymentMethodId into the form so it gets submitted to the server
            const form = document.getElementById('setup-form');

            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'paymentMethodId');
            hiddenInput.setAttribute('value', paymentMethodId);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }

        $(function () {
            $('form').submit(function () {
                $(this).find(':submit').attr('visibility', 'hidden');
            });
        });

        $(document).ready(function()
        {
            $("button").click(function()
            {
                $("#wait").show();
            });
        });
    </script>
@endpush

@endsection