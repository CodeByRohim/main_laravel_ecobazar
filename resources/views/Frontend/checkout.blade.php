@extends('layouts.FrontendLayout')
@section('checkout')
@section('title','Checkout')
              <!-- Breadcrumbs Start Here -->
      <section id="Breadcrumbs">
        <div class="container">
           <ul>
              <li class="d-flex align-items-center">
                 <a href="index.html" class="homeIcom">
                    <iconify-icon icon="fluent:home-16-regular" width="20" height="22"></iconify-icon>
                 </a>
                 <iconify-icon icon="formkit:right" width="15" height="15" style="color: #999"></iconify-icon>
              </li>
              <li class="d-flex align-items-center">
                 <a href="./shopping cart.html" class="activ">Shopping Cart</a>
              </li>
              <li class="d-flex align-items-center">
                <iconify-icon icon="formkit:right" width="15" height="15" style="color: #999"></iconify-icon>
                <a href="./checkout.html" class="activ">Checkout</a>
             </li>
           </ul>
        </div>
     </section>
     <!-- Breadcrumbs End Hear -->
   @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<!-- BILLING INFO START HERE -->
 <section id="BillingInfo">
  <div class="container">
    <div class="row bill justify-content-between">
      <!-- left -->
      <div class="col-lg-8 bill">
        <div class="left">
          <h2>Billing Information</h2>
          <form action="" method="POST">
            <div class="first-last-com-wrap">
              <div class="formGroup">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" value="{{$user->name ?? ''}}">
              </div>
              <div class="formGroup">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" value="{{$user->email ?? ''}}">
              </div>
              <div class="formGroup">
                <label for="phone">Phone</label>
                <input type="tel" id="phone" name="phone" placeholder="Enter your phone" value="{{$user->phone ?? ''}}">
              </div>
            </div>

            <div class="formGroup">
              <label for="address">Street Address</label>
              <input type="text" id="address" name="address" placeholder="Enter your address" value="{{$user->address ?? ''}}">
            </div>

            <div class="country-status-zip">
              <div class="formGroup">
                <label for="country">Country</label>
                  <!-- <input type="text" id="country" placeholder="country"> -->
                  <select class="form-select form-select-lg mb-3" aria-label="Large select example" id="country">
                    <option selected>Country</option>
                    <option value="1">BD</option>
                    <option value="2">US</option>
                    <option value="3">UK</option>
                  </select>
                
                
              </div>
              <div class="formGroup">
                <label for="city">States</label>
                <!-- <input type="text" id="city" placeholder="Enter your city"> -->
                <select class="form-select form-select-lg mb-3" aria-label="Large select example" id="country">
                  <option selected>Selects</option>
                  <option value="1">Dhaka</option>
                  <option value="2">New York</option>
                  <option value="3">London</option>
                </select>
              </div>

              <div class="formGroup">
                <label for="zip">Zip Code</label>
                <input type="text" id="zip" name="zipCode" placeholder="Enter your zip code" value="{{Auth::user()->zipCode ?? ''}}">
              </div>             
            </div>
      </form>
         <form action="" method="POST">
            <div class="email-phone">
              <div class="formGroup">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Email Address">
              </div>
              <div class="formGroup">
                <label for="phone">Phone</label>
                <input type="text" id="phone" placeholder="Phone number">
              </div>            
            </div>

            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
              <label class="form-check-label" for="flexCheckDefault">
                Ship to a different address
              </label>
            </div>
            

            <h2>Additional Info</h2>

            <div class="formGroup add">
              <label for="note">Order Notes (Optional)</label>
              <textarea name="note" id="note" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
            </div>
          </form>
        </div>
        </div>
        <!-- right -->
      <div class="col-lg-4">
       <div class="right ">
        <div class="card">
          <div class="card-header">
            Order Summery
          </div>
          <div class="productSum">
            <!-- product 1 -->
           
             @forelse($item as $items)
            <div class="d-flex align-items-center justify-content-between">
              <div class="productImg">
                <img class="img-fluid" src="./images/product img/Image.svg" 
                alt="">   
                <h4>{{ $items->product->title}}</h4>             
              </div>
              <div class="productText">                              
                <p>{{($items->product->selling_price) * ($items->qty)}}</p>
              </div>
            </div>
            @empty
            <div ><p class="text-center">No product found</p></div>
            @endforelse
          
          </div>
          <ul class="list-group list-group-flush">
              @php
                $grandTotal = 0;
                $grandSubTotal = 0;
            @endphp
            @forelse($item as $cartitem)
              @php
              $subtotal = ($cartitem->product?->selling_price ?? 0) * $cartitem->qty;
              $grandSubTotal += $subtotal;
                  $itemTotal = (($cartitem->product?->selling_price ?? 0) * $cartitem->qty) + (($cartitem->product?->selling_price ?? 0) * $cartitem->qty) * 5 / 100;
                  $grandTotal += $itemTotal;
              @endphp
            
           @empty
               <span>no products found!</span> 
            @endforelse 
            <li class="list-group-item d-flex justify-content-between br">Subtotal: <span>{{$grandSubTotal}}</span></li>
            <li class="list-group-item d-flex justify-content-between br">Shipping: <span>Free</span></li>
            <li class="list-group-item d-flex justify-content-between">Total: <span>{{$grandTotal}}</span></li>
          </ul>
          <!--  -->
          <div class="card-header">
            Payment Method
          </div>

          <div class="payment">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
              <label class="form-check-label" for="flexRadioDefault1">
                Cash on Delivery
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
              <label class="form-check-label" for="flexRadioDefault2">
                Paypal
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
              <label class="form-check-label" for="flexRadioDefault3">
                Amazon Pay
              </label>
            </div>
          </div>
<form action="{{route('stripe.store')}}" id="stripe-form" method="POST">
  @csrf
  <input type="hidden" id="userName" name="name" value="{{Auth::user()->name ?? ''}}">
  <input type="hidden" id="userEmail" name="email" value="{{Auth::user()->email ?? ''}}">
  <input type="hidden" name="txn_id" value="">
  <input type="hidden" name="amount" value="{{$grandTotal}}">
  <input type="hidden" class="" id="stripe-token" name="stripeToken">
<div id="card-element" class="form-control"></div>
   <button class="checkout" type="button" onclick="createToken()">Place Order</button>
</form>
          
            
        </div>
       </div>
         </div>
         </div>
          </div>
 </section>
<!-- BILLING INFO END HERE -->
@push('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
     $(document).ready(function() {
      $('.venobox').venobox(); // Initialize VenoBox
    });
    document.getElementById('name').addEventListener('input', function () {
        
      let username =   document.getElementById('userName').value = this.value;
        console.log(username)
    });
     document.getElementById('email').addEventListener('input', function () {
        
     let useremail =  document.getElementById('userEmail').value = this.value;
        console.log(useremail)
    });

</script>
{{-- <script src="https://js.stripe.com/basil/stripe.js"></script> --}}
<script>
  var stripe = Stripe("{{ config('services.stripe.key') }}");
  var elements = stripe.elements();
  var cardElement = elements.create('card');
  cardElement.mount('#card-element');
  
  function createToken() {
    stripe.createToken(cardElement).then(function(result) {
  
  if (result.token) {
    document.getElementById("stripe-token").value = result.token.id;
    document.getElementById("stripe-form").submit();
 }
});
  }

</script>
@endpush
@endsection