@extends('layouts.FrontendLayout')
@section('addToCart')
@section('title','Add To Cart')

 <!-- Breadcrumbs Start Here -->
 <section id="Breadcrumbs">
   <div class="container">
      <ul>
         <li class="d-flex align-items-center">
            <a href="./index.html" class="homeIcom">
               <iconify-icon icon="fluent:home-16-regular" width="20" height="22"></iconify-icon>
            </a>
            <iconify-icon icon="formkit:right" width="15" height="15" style="color: #999"></iconify-icon>
         </li>
         <li class="d-flex align-items-center">
            <a href="#" class="activ">Shopping Cart</a>
         </li>
      </ul>
   </div>
</section>
<!-- Breadcrumbs End Hear -->

<!-- Shopping Cart Start Here -->
 <section id="ShoppingCart">
  <div class="container">
    <h2>My Shopping Cart</h2>
    <div class="row justify-content-between">
      <div class="col-12 col-lg-8">
       <div class="heading">
        <ul class="cartList">
          <div class="col-lg-4">
            <li class="">
              <h4>PRODUCT</h4>
              </li>
          </div>
          <div class="col-lg-2">
            <li class="">
              <h4>PRICE</h4>
            </li>
          </div>
          <div class="col-lg-3">
            <li class="">
              <h4>QUANTITY</h4>
            </li>
          </div>
          <div class="col-lg-2">
            <li class="">
              <h4>SUBTOTAL</h4>
            </li>
          </div>
          <div class="col-lg-1 d-none d-lg-block">
            <li class="">
              <h4></h4>
            </li>
          </div>
        </ul>
       </div>
       <!-- product -->
        {{-- @if(Auth::guard('customer')->check() || Auth::guard('web')->check()) --}}
      {{-- @auth --}}
        @forelse($item as $items)
        <div class="cartItem"  data-id="{{ $items->product_id }}">
          <div class="cartItemWrapper d-flex align-items-center">
            <div class="col-lg-4 cartItemImg d-flex align-items-center">
              <img class="img-fluid" src="{{asset('storage/' . $items->product->featured_image)}}" alt="">
              <div class="cartItemText">    
                  <h4>{{$items->product->title }}</h4> 
                
              </div>
            </div>
          
            <div class="col-lg-2 cartItemPrice">
              <h4 >Tk.<span class="price">{{$items->product->selling_price}}</span></h4>
            </div>
            <div class="col-lg-3 cartItemQuantity">
              <div class="quantity">
                <div class="qty-wrapper">
                    <button type="button" class="decrement" >−</button>
                    
                    <input type="number" class="qty-input" value="{{ $items->qty }}" data-id="{{ $items->id }}" readonly>
                    
                    <button type="button" class="increment" >+</button>
                </div>
        
              </div>
            </div>
            <div class="col-lg-2 cartItemTotal">
              <h4>Tk.<span class="subtotal">{{($items->product->selling_price) * ($items->qty)}}</span></h4>
            </div>
            <div class="col-lg-1 cartItemAction text-end remove-from-cart">
              <a href="#"><i class="fa-solid fa-xmark"></i></a>
            </div>
          </div>
      </div> 
     
      @empty
      <div class="text-center m-auto"><span class="text-center m-auto">No Product Add !</span></div>
      @endforelse
      {{-- @else
    <div class="text-center py-4">
        <span>Please login to view your cart.</span> --}}
    {{-- </div>
      @endauth --}}
       {{-- @endif --}}
      <!-- product return and update -->
      <div class="cartItem ReturnUpdate">
        <div class="cartItemWrapper d-flex align-items-center justify-content-betwee">
          <div class="col-lg-6 cartItemImg">
              <a class="bottomBtn" href="#">Return to shop</a>
          </div>
                      
          <div class="col-lg-6 cartItemAction text-end">
            <a class="bottomBtn"   id="updateCartBtn">Update Cart</a>
          </div>
        </div>
      </div>
      <!-- coupon code -->
      <div class="cartItem coupon">
        <div class="cartItemWrapper d-flex align-items-center">
          <div class="col-lg-3 cartCoupon">
              <p class="bottomBtn">Coupon Code</p>
          </div>

          <div class="col-lg-9 couponInput text-end">
            <!-- <a class="bottomBtn" href="#">Update Cart</a> -->
            <input type="text" placeholder="Enter code">
            <button>Apply Coupon</button>
          </div>
        </div>
      </div>
      </div>

       <!-- right side -->
       <div class="right col-12 col-lg-4">
        <div class="card">
          <div class="card-header">
            Cart Total
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
               <span class="px-3 text-secondary">No products found!</span> 
            @endforelse
             <li class="list-group-item d-flex justify-content-between br">Subtotal: <span>TK.<span class="total">{{$grandSubTotal}}</span></span></li>
            <li class="list-group-item d-flex justify-content-between br">Shipping: <span>Free</span></li>
            <li class="list-group-item d-flex justify-content-between">Total:  <span><span><sub class="text-secondary"> 5% VAT included</sub></span>TK. <span class="itemTotal" id="total">{{$grandTotal}}</span></span></li>
          </ul>
         
        
          <a class="checkout" href="{{route('checkout')}}">         
               Proceed to checkout
            </a>
        </div>
       </div>
       </div>

  @push('scripts')
<script>
   
    let cartUpdates = {}; 

    $('.increment').on('click', function () {
        const $input = $(this).siblings('.qty-input');
        $input.val(parseInt($input.val()) + 1).trigger('input');
    });

    $('.decrement').on('click', function () {
        const $input = $(this).siblings('.qty-input');
        const currentVal = parseInt($input.val());
        if (currentVal > 1) {
            $input.val(currentVal - 1).trigger('input');
        }
    });

    $('.qty-input').on('input', function () {
        const cartItemId = $(this).data('id');
        const newQty = parseInt($(this).val());

        if (newQty >= 1) {
            cartUpdates[cartItemId] = newQty;
        }
    });

    $('#updateCartBtn').on('click', function () {
        if (Object.keys(cartUpdates).length === 0) {
            Swal.fire("No changes to update!");
            return;
        }

        $.ajax({
            url: '{{ route("cart.update") }}', 
            method: 'GET',
            data: {
                updates: cartUpdates,
                // _token: '{{ csrf_token() }}'
            },
            success: function (res) {
                if (res.status === 'success') {
                    Swal.fire("Cart updated!").then(() => {
            
                         location.reload(); 
                  
                    });
                   
                } else {
                    Swal.fire("Something went wrong!");
                }
            },
            error: function () {
                Swal.fire("Failed to update cart!");
            }
        });
    });
</script>
@endpush
@endsection
