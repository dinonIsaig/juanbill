<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminProfileContoller extends Controller
{
    public function update(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'username' => 'required|string|max:255|unique:admins,username,' . $request->admin()->id,
            'email' => 'required|string|email|max:255|unique:admins,email,' . $request->admin()->id,
            'contact_no' => 'required|string|max:20|unique:admins,contact_no,' . $request->admin()->id,
        ]);

        $admin = auth()->guard('admin')->user();

        try {
            $admin->update($validated);
            return redirect()->back()->with('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            Log::error('Profile update failed for user '.$admin->id.': '.$e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Failed to update profile. Please try again.');
        }
    }
}
