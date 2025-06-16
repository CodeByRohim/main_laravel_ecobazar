<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;




class CustomerProfileController extends Controller
{
    function index(){
         $customer = Auth::guard('customer')->user();
        return view('Frontend.UserDashboard.index',compact('customer'));
    }
   public function logout(Request $request)
{
    Auth::guard('customer')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return view('auth.login');
}
}
