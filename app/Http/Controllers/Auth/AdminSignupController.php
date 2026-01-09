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
            'admin_id'   => 'required|integer|exists:admins,admin_id', 
            'first_name' => 'required|string|max:50',
            'middle_name'=> 'nullable|string|max:50',
            'last_name'  => 'required|string|max:50',
            'email'      => 'required|string|email|max:100|unique:admins,email',
            'contact_no' => 'required|string|max:15|unique:admins,contact_no',
            'dob'        => 'required|date',
            'username'   => 'required|string|unique:admins,username',
            'password'   => 'required|string|min:8|confirmed',
        ]);

        //find the pre-seeded slot
        $admin = Admin::where('admin_id', $validated['admin_id'])->first();

        // prevent re-registration if is_registered is already true
        if ($admin->is_registered) {
            return back()->withErrors(['admin_id' => 'This Admin ID has already been registered.'])->withInput();
        }

        // update the existing record instead of using Admin::create()
        $admin->update([
            'first_name'   => $validated['first_name'],
            'middle_name'  => $validated['middle_name'],
            'last_name'    => $validated['last_name'],
            'email'        => $validated['email'],
            'contact_no'   => $validated['contact_no'],
            'dob'          => $validated['dob'],
            'username'     => $validated['username'],
            'password'     => Hash::make($validated['password']),
            'is_registered' => true, // mark as used
        ]);

        return redirect()->route('admin.log-in')->with('success', 'Admin account created!');
    }

    public function checkAdminId(Request $request)
    {
        $admin = Admin::where('admin_id', $request->admin_id)->first();

        if (!$admin) {
            return response()->json(['valid' => false, 'message' => 'Admin ID not found in system.']);
        }

        if ($admin->is_registered) {
            return response()->json(['valid' => false, 'message' => 'This Admin ID is already registered.']);
        }

        return response()->json(['valid' => true]);
    }
}
