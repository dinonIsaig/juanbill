<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminWaterController extends Controller
{
    public function index(Request $request)
    {
        $year = (int)$request->input('year', date('Y'));

        // Fetch all Water bills for the year
        $billsQuery = Bill::where('type', 'Water')
            ->whereYear('due_date', $year);

        $bills = $billsQuery->orderBy('due_date', 'desc')->paginate(10);

        // Chart Data Calculation
        $monthlyBills = Bill::where('type', 'Water')
            ->whereYear('due_date', $year)
            ->get();

        $monthlyTotals = array_fill(0, 12, 0);
        $billCounts = array_fill(0, 12, 0);
        $chartData = array_fill(0, 12, 0);

        foreach ($monthlyBills as $bill) {
            $monthIndex = Carbon::parse($bill->due_date)->month - 1;
            $monthlyTotals[$monthIndex] += $bill->consumption;
            $billCounts[$monthIndex]++;
        }

        for ($i = 0; $i < 12; $i++) {
            if ($billCounts[$i] > 0) {
                $chartData[$i] = round($monthlyTotals[$i] / $billCounts[$i], 2);
            }
        }

        return view('admin.water', compact('year', 'chartData', 'bills'));
    }
}
