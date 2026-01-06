<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnlinePaymentController extends Controller
{
    public function pay(Request $request, $id)
    {

        $bill = Bill::where('user_id', Auth::id())
                    ->where('id', $id)
                    ->firstOrFail();

        // Update
        $bill->status = 'Paid';
        $bill->payment_method = 'Online Payment';
        $bill->date_paid = now();
        $bill->save();

        return redirect()->back()->with('success', 'Payment successful!');
    }
}
