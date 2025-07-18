<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Stripe With Laravel 11</title>
  </head>
  <body>
    <div class="container col-md-4">
        <div class="card mt-5">
            <div class="card-header">
              <h4>Make Payment</h4>
            </div>
            <div class="card-body">
                @session('success')
                <div class="alert alert-success">
                    {{ $value }}
                </div>
                @endsession

                <div class="p-3 bg-light bg-opacity-10">
                    <h6 class="card-title mb-3">Order Summary</h6>
                    <div class="d-flex justify-content-between mb-1">
                        <span>Sub-total</span> : <span>$190</span>
                    </div>
                    <div class="d-flex justify-content-between mb-1">
                        <span>Tax</span> : <span>$10</span>
                    </div>
                    <div class="d-flex justify-content-between mb-1">
                        <span>Shipping</span> : <span>$90</span>
                    </div>

                    <div class="d-flex justify-content-between mb-1">
                        <span>Coupon (Code:NEWYEAR)</span> : <span>-$5</span>
                    </div>
                    <hr>

                    <div class="d-flex justify-content-between mb-1">
                        <span>Total</span> : <strong>$285</strong>
                    </div>

                    <form action="{{ route('stripe.charge') }}" method="post" id="stripe-form">
                        @csrf
                        <input type="hidden" name="price" value="285">
                        <input type="hidden" name="stripeToken" id="stripe-token">
                            <!-- Stripe Card Element Section -->
                        <label for="card-element">Credit or debit card</label>
                        <div id="card-element" class="form-control mb-3">
                            <!-- Stripe will insert the card form here -->
                        </div>

                        <!-- Submit Button -->
                        <button class="btn btn-primary w-100 mt-2" type="button" onclick="createToken()">Submit</button>


                    </form>

                    
                </div>
            </div>
        
        </div>
    </div>
 

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!--<script src="https://js.stripe.com/basil/stripe.js"></script>-->

    <script src="https://js.stripe.com/v3/"></script>

    <script>
        var stripe = Stripe("{{ env('STRIPE_KEY') }}");
        var elements = stripe.elements();
        var cardElement = elements.create('card');
        cardElement.mount('#card-element');

        function createToken(){
            stripe.createToken(cardElement).then(function(result) {
            // Handle result.error or result.token
            console.log(result);
            if (result.token){
                document.getElementById('stripe-token').value = result.token.id;
                document.getElementById('stripe-form').submit();
            }
            });
        }

    </script>


    
  </body>
</html>
