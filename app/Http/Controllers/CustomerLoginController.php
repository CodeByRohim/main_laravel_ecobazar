<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class CustomerLoginController extends Controller
{
    use AuthenticatesUsers;
     protected $redirectTo = '/my-profile';
      protected function guard()
    {
        return Auth::guard('customer');
    }

    public function googleLogin(){
        return Socialite::driver('google')->redirect();
    }
    
    public function googleRedirect(){
        $user = Socialite::driver('google')->stateless()->user();
        $userArray = [
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone ?? null,
            'password' => Hash::make(uniqid()),
            'image' => $user->avatar,
        ];
       
       $userData = Customers::updateOrCreate([
          'email' => $userArray['email']
        ],$userArray); 
         
        Auth::guard('customer')->login($userData);
       return to_route('frontend.userDashboard')->with('success','Login Successfully');
    }




    public function facebookLogin(){
        return Socialite::driver('facebook')->scopes(['email'])->redirect();
    }
    
    public function facebookRedirect(){
        $user = Socialite::driver('facebook')->stateless()->user();
        
        if (empty($user->email)) {
        
        session([
            'fb_user' => [
                'name' => $user->name,
                'avatar' => $user->avatar,
            ]
        ]);

        return redirect()->route('customer.email.form');
    }


        $userArray = [
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone ?? null,
            'password' => Hash::make(uniqid()),
            'image' => $user->avatar,
        ];
     
       $userData = Customers::updateOrCreate([
          'email' => $userArray['email']
        ],$userArray); 
         
        Auth::guard('customer')->login($userData);
       return to_route('frontend.userDashboard')->with('success','Login Successfully');
    }
}
