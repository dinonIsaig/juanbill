<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OnlinePaymentController extends Controller
{
    public function pay(Request $request, $bill_id)
    {

        $bill = Bill::where('user_id', Auth::id())
                    ->where('bill_id', $bill_id)
                    ->firstOrFail();

        // Update
        $bill->status = 'Paid';
        $bill->payment_method = 'Online Payment';
        $bill->date_paid = now();
        $bill->save();

        return redirect()->back()->with('success', 'Payment successful!');
    }

    public function cash(Request $request, $bill_id)
    {

        $bill = Bill::where('user_id', Auth::id())
                    ->where('bill_id', $bill_id)
                    ->firstOrFail();

        // Update
        $bill->status = 'Pending';
        $bill->save();

        return redirect()->back()->with('success', 'Payment successful!');
    }

}
