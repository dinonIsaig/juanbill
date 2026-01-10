<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $request->user()->user_id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $request->user()->user_id,
            'contact_no' => 'required|string|max:20|unique:users,contact_no,' . $request->user()->user_id,
        ]);

        $user = $request->user();

        try {
            $user->update($validated);
            return redirect()->back()->with('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            Log::error('Profile update failed for user '.$user->user_id.': '.$e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Failed to update profile. Please try again.');
        }
    }
}
