<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;;

class AdminSignupController extends Controller
{
    /**
     * Show the admin registration form.
     */
    public function create()
    {
        return view('admin.sign-up');
    }

    public function store(Request $request)
    {
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

        // Create the record in the 'admins' table
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

        return redirect()->route('admin.log-in')->with('success', 'Admin account created!');
    }
}
