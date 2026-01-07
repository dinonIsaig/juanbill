<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Carbon\Carbon;

class AdminElectricityController extends Controller
{
    public function index(Request $request)
    {
        $availableYears = Bill::where('type', 'Electricity')->selectRaw('YEAR(due_date) as year')->distinct()->orderBy('year', 'desc')->pluck('year');
        $year = (int)$request->input('year', date('Y'));

        $query = Bill::where('type', 'Electricity');

        $bills = $query->with('user')->orderBy('due_date', 'desc')->paginate(10)->withQueryString(); // withQueryString to filter during pagination

        if ($request->filled('year') && $request->input('year') !== 'all') {
            $query->whereYear('due_date', $request->input('year'));
        }

        if ($request->filled('month') && $request->input('month') !== 'all') {
            $query->whereMonth('due_date', $request->input('month'));
        }

        if ($request->filled('status') && $request->input('status') !== 'all') {
            $query->where('status', $request->input('status'));
        }

        $monthlyBills = Bill::where('type', 'Electricity')->whereYear('due_date', $year)->get();
        
        $monthlyTotals = array_fill(0, 12, 0);
        $billCounts = array_fill(0, 12, 0);
        $chartData = array_fill(0, 12, 0); 

        foreach ($monthlyBills as $bill) {
            $monthIndex = Carbon::parse($bill->due_date)->month - 1;
            $monthlyTotals[$monthIndex] += $bill->consumption; 
            $billCounts[$monthIndex]++; // Increment count to calculate average later
        }
        
        for ($i = 0; $i < 12; $i++) {
            if ($billCounts[$i] > 0) {
                $chartData[$i] = round($monthlyTotals[$i] / $billCounts[$i], 2);
            }
        }

        return view('admin.electricity', compact('bills', 'availableYears', 'chartData', 'year'));    

    }
}
