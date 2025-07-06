<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FacebookAuthController extends Controller
{
    public function showEmailForm()
{
    $fbUser = session('fb_user');

    if (!$fbUser) {
        return redirect()->route('customer.login')->withErrors('Session expired. Try again.');
    }

    return view('auth.customer.email-form', compact('fbUser'));
}

public function submitEmailForm(Request $request)
{
    $request->validate([
        'email' => 'required|email',
    ]);

    $fbUser = session('fb_user');

    if (!$fbUser) {
        return redirect()->route('customer.login')->withErrors('Session expired. Try again.');
    }

    
    $existingUser = Customers::where('email', $request->email)->first();

    if ($existingUser) {
        // Update provider info if needed
        $existingUser->update([
            'image' => $fbUser['avatar'] ?? null,
        ]);

        
        Auth::guard('customer')->login($existingUser);

        // Clear session
        session()->forget('fb_user');

        return redirect()->route('frontend.userDashboard')->with('success', 'Login Successfully');
    }

    // Otherwise, create new user
    $user = Customers::create([
        'name' => $fbUser['name'],
        'email' => $request->email,
        'password' => Hash::make(uniqid()),
        'image' => $fbUser['avatar'] ?? null,
        
    ]);

    session()->forget('fb_user');

    Auth::guard('customer')->login($user);
    return redirect()->route('frontend.userDashboard')->with('success', 'Login Successfully');
}

}
