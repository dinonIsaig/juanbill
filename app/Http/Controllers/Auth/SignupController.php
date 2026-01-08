<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

class SignupController extends Controller
{
    /**
     * Show the registration form.
     */
    public function showRegister()
    {
        return view('user.sign-up');
    }

    /**
     * Handle the registration request.
     */
        public function store(Request $request)
    {
        // 1. VALIDATION FIRST
        // Keep this OUTSIDE the try-catch/transaction.
        // If this fails, Laravel automatically redirects back with errors.
        $validated = $request->validate([
            'first_name' => 'required|string|max:50',
            'middle_name' => 'nullable|string|max:50',
            'last_name'  => 'required|string|max:50',
            'email'      => 'required|string|email|max:100|unique:admins,email',
            'contact_no' => 'required|string|max:15|unique:admins,contact_no',
            'dob'        => 'required|date',
            'username'   => 'required|string|unique:admins,username',
            'admin_id'   => 'required|string|unique:admins,admin_id',
            'password'   => 'required|string|min:8|confirmed',
        ]);

        // 2. TRANSACTION BLOCK
        try {
            DB::beginTransaction();

            // Create the record
            Admin::create([
                'first_name' => $validated['first_name'],
                'middle_name'=> $validated['middle_name'],
                'last_name'  => $validated['last_name'],
                'email'      => $validated['email'],
                'contact_no' => $validated['contact_no'],
                'dob'        => $validated['dob'],
                'username'   => $validated['username'],
                'admin_id'   => $validated['admin_id'],
                'password'   => Hash::make($validated['password']),
            ]);

            DB::commit(); // Save changes if successful

            return redirect()->route('admin.log-in')->with('success', 'Admin account created!');

        } catch (\Exception $e) {
            // 3. ROLLBACK & RETURN ERROR
            DB::rollBack();
            return back()
                ->withInput() // Keeps the typed data in the form
                ->withErrors(['error' => 'Registration failed. Please try again.']);
        }
    }
}
