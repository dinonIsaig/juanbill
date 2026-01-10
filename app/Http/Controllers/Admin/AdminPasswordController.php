<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminPasswordController extends Controller
{
    public function update(Request $request)
    {

        $request->validate([
            'current_password' => 'required|current_password', // Checks if matches actual DB password
            'password' => [
                'required',
                'confirmed',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
            ],
        ]);

        $admin = auth()->guard('admin')->user();

        try {

            $admin->update([
                'password' => Hash::make($request->password)
            ]);

            return redirect()->back()->with('success', 'Password updated successfully.');
        } catch (\Exception $e) {
            Log::error("Password update failed for user {$admin->id}: {$e->getMessage()}");
            return redirect()->back()->with('error', 'Failed to update password. Please try again.');
        }
    }
}
