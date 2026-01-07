<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminElectricityController extends Controller
{
    public function index(Request $request)
    {
        // 1. Get the requested year, default to current year if missing
        $year = (int)$request->input('year', date('Y'));

        // 2. Fetch all Electricity bills for the selected year
        $bills = Bill::where('type', 'Electricity')
            ->orderBy('due_date', 'desc')
            ->paginate(10);

        // 4. Fetch Data for Chart (Annual Summary)
        $monthlyBills = Bill::where('type', 'Electricity')
            ->whereYear('due_date', $year)
            ->get();
        
        // Arrays to track monthly totals and the number of bills (units)
        $monthlyTotals = array_fill(0, 12, 0);
        $billCounts = array_fill(0, 12, 0);
        $chartData = array_fill(0, 12, 0); // This will hold the final averages

        foreach ($monthlyBills as $bill) {
            $monthIndex = Carbon::parse($bill->due_date)->month - 1;
            $monthlyTotals[$monthIndex] += $bill->consumption; 
            $billCounts[$monthIndex]++; // Increment count to calculate average later
        }
        
        // 5. Calculate Average (Total / Count) for each month
        for ($i = 0; $i < 12; $i++) {
            if ($billCounts[$i] > 0) {
                // Round to 2 decimal places for a clean chart
                $chartData[$i] = round($monthlyTotals[$i] / $billCounts[$i], 2);
            }
        }

        // 5. Pass variables to the admin view
        return view('admin.electricity', [
            'year'      => $year,
            'chartData' => $chartData,
            'bills'     => $bills
        ]);
    }
}
