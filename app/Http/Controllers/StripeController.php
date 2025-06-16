<?php

namespace App\Http\Controllers;
use Stripe\StripeClient;
use Illuminate\Http\Request;
use App\Mail\PaymentSuccessMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Client\ResponseSequence;

class StripeController extends Controller
{
    function index(){
        return view('Frontend.checkout');
    }
    
    function store(Request $request){
       
       $stripe = new StripeClient(config('services.stripe.secret'));
        $charge = $stripe->charges->create([
        'amount' => $request->amount * 100,
        'currency' => 'usd',
        'source' => $request->stripeToken,
        'description' => 'Ecobazar payment',
        ]);
        
           // After successful charge
        $data = [    
            'email' => optional(Auth::guard('customer')->user() ?? Auth::guard('web')->user())->email,
            'name' =>$request->name,
            'amount' => $request->amount,
            'txn_id' => $charge->id,
            'url' => 'http://127.0.0.1:8000',
        ];
       
        Mail::to($data['email'])->send(new PaymentSuccessMail($data)); 
            
        return to_route('checkout')->with('status','Payment Successful.');
       
            }
}


