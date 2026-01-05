<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{
    public function index(Request $request)
    {
        // 1. Get the requested year, default to current year if missing
        $year = $request->input('year', date('Y'));

        // 2. Fetch Bills for Table (Paginated)
        $bills = Bill::where('user_id', Auth::id())
                    ->where('type', 'Rent')
                    ->orderBy('due_date', 'desc')
                    ->paginate(10);

        // 3. Fetch Data for Chart (Grouped by Month)
        // We get all bills for the selected year to calculate totals
        $monthlyBills = Bill::where('user_id', Auth::id())
            ->where('type', 'Rent')
            ->whereYear('due_date', $year)
            ->get();

        // Initialize array with 0s for Jan(0) to Dec(11)
        $chartData = array_fill(0, 12, 0);

        foreach ($monthlyBills as $bill) {
            // Carbon 'month' property is 1-12. We subtract 1 for array index (0-11).
            // We use += just in case there are split bills in one month
            $monthIndex = $bill->due_date->month - 1;
            $chartData[$monthIndex] += $bill->consumption; // Summing water
        }

        return view('user.rent', compact('bills', 'chartData', 'year'));
    }
}
