<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    function index(){
        // main checkout
     $user = Auth::guard('customer')->user() ?? Auth::guard('web')->user();
     $userId = $user?->id;
        
     $item = Cart::with('product:id,slug,title,price,selling_price,featured_image')
        ->when($user, function ($query) use ($user, $userId) {
            $query->where('userable_type', get_class($user))
                  ->where('userable_id', $userId);
        }, function ($query) {
            $query->where('ip', request()->ip());
        })
        ->get();



        // $product = Product::where('status', true)->first();
        
        //  $item = session('checkout_item');
        //  $product = session('checkout_product');
        //  $userId =  session('checkout_UserId');
        //  $user =  session('checkout_User');
        return view('Frontend.checkout',compact('item'));
    }
}
