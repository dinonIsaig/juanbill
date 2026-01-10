<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('user.log-in');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string',
            'unit_number' => 'required|integer',
            'password' => 'required|string',
        ]);

        $unit = Unit::where('unit_id', $data['unit_number'])->first();

        if (! $unit) {
            throw ValidationException::withMessages(['unit_number' => 'Unit number not found.']);
        }

        $user = User::where('username', $data['username'])->first();

        if (! $user || $user->unit_id != $unit->unit_id || ! Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages(['username' => 'These credentials do not match our records.']);
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('user.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
