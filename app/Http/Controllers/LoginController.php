<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Filament\Http\Controllers\Auth\LoginController as FilamentLoginController;
use Illuminate\Support\Facades\Auth;

class LoginController extends FilamentLoginController
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // First, attempt to login as an admin
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/admin/dashboard');  // Change route as needed
        }

        // If admin login fails, attempt to login as a user
        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->intended('/dashboard');  // Change route as needed
        }

        // If both fail, return back with an error message
        return back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }
}
?>
