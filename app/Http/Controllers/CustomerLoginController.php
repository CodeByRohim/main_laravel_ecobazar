<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class CustomerLoginController extends Controller
{
    use AuthenticatesUsers;
     protected $redirectTo = '/my-profile';
      protected function guard()
    {
        return Auth::guard('customer');
    }
}
