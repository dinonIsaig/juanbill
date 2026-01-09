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
            'admin_id' => 'required|integer',
            'password' => 'required|string',
        ]);

        // 
        $attemptData = array_merge($data, ['is_registered' => true]);

        // attempt to log in the admin
        if (Auth::guard('admin')->attempt($attemptData)) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        // check if the admin exists but isn't registered yet
        $unregistered = \App\Models\Admin::where('admin_id', $request->admin_id)
            ->where('is_registered', false)
            ->exists();

        if ($unregistered) {
            return back()->withErrors([
                'admin_id' => 'This account has not been registered yet. Please sign up first.',
            ])->onlyInput('username', 'admin_id');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username', 'admin_id');
    }

    public function logout(Request $request)
{
    Auth::guard('admin')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('admin.log-in');
}
}
