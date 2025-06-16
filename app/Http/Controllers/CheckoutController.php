<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    function index(){

         $item = session('checkout_item');
         $product = session('checkout_product');
         $userId =  session('checkout_UserId');
         $user =  session('checkout_User');
       

        return view('Frontend.checkout',compact('item','product','user','userId'));
    }
}
