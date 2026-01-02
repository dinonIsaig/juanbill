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
        $request->validate([
            'first_name' => 'required|string|max:50',
            'middle_name' => 'nullable|string|max:50',
            'last_name' => 'required|string|max:50',
            'email' => 'required|string|email|max:100|unique:users',
            'contact_no' => 'required|string|max:15',
            'dob' => 'required|date',
            'unit_number' => 'required|integer',
            'username' => 'required|string|max:50|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'unit_number.exists' => 'This unit number does not exist in our records.',
        ]);

        DB::beginTransaction();

        try {
            // Find the Unit ID
            $unit = Unit::where('id', $request->unit_number)->lockForUpdate()->first();

            if (! $unit) {
                throw ValidationException::withMessages([
                    'unit_number' => 'This unit number does not exist in our records.',
                ]);
            }

            // Create the User
            $user = User::create([
                'unit_id'    => $unit->id,
                'first_name' => $request->first_name,
                'middle_name'=> $request->middle_name,
                'last_name'  => $request->last_name,
                'email'      => $request->email,
                'contact_no' => $request->contact_no,
                'username'   => $request->username,
                'password'   => Hash::make($request->password),
                'dob'        => $request->dob,
            ]);

            DB::commit();

            return redirect()->route('login')->with('success', 'Account created! Please login.');

        } catch (\Exception $e) {
            DB::rollBack();

            if ($e instanceof ValidationException) {
                throw $e;
            }

            return back()->withInput()->with('error', 'Something went wrong. Please try again.');
        }
    }
}
