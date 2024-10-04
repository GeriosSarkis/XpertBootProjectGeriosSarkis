<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('filament.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($request->input('user_type') === 'admin') {
            if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
                return redirect()->intended(route('filament.pages.dashboard'));
            }
        } else {
            if (Auth::guard('web')->attempt($credentials, $request->filled('remember'))) {
                return redirect()->intended(route('filament.pages.dashboard'));
            }
        }

        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }


    public function logout(Request $request)
    {
        Auth::guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('filament.auth.login');
    }
}

?>
