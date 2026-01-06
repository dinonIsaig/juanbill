<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showLogin()
    {
        return view('admin.log-in');
    }

    public function login(Request $request)
    {
        
        $data = $request->validate([
            'username' => 'required|string',
            'admin_id' => 'required|string',
            'password' => 'required|string',
        ]);

        // 2. Attempt login using the 'admin' guard defined in config/auth.php
        if (Auth::guard('admin')->attempt($data)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        // 3. Fail state
        return back()->withErrors([
            'username' => 'The provided data do not match our records.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
{
    Auth::guard('admin')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('admin.log-in');
}
}
