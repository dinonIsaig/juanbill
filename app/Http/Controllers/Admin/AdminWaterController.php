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
        // Get available years for the dropdown
        $availableYears = Bill::where('type', 'Water')
            ->selectRaw('YEAR(due_date) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        // Main Table Query (Filters)
        $query = Bill::where('type', 'Water');

        if ($request->filled('year') && $request->input('year') !== 'all') {
            $query->whereYear('due_date', $request->input('year'));
        }

        if ($request->filled('month') && $request->input('month') !== 'all') {
            $query->whereMonth('due_date', $request->input('month'));
        }

        if ($request->filled('status') && $request->input('status') !== 'all') {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('TransactionID')) {
            $query->where('id', $request->input('TransactionID'));
        }

        $bills = $query->with('user')
            ->orderBy('due_date', 'desc')
            ->paginate(10)
            ->withQueryString();


        $chartYear = $request->input('chart_year', date('Y'));

        $chartData = array_fill(0, 12, 0);

        $monthlyWaterAverage = Bill::where('type', 'Water')
            ->whereYear('due_date', $chartYear)
            ->selectRaw('MONTH(due_date) as month, AVG(consumption) as average_value')
            ->groupBy('month')
            ->get();

        foreach ($monthlyWaterAverage as $data) {
            $chartData[$data->month - 1] = $data->average_value;
        }

        $averageWater = number_format(collect($chartData)->filter()->avg(), 2);

        return view('admin.water', compact('bills', 'availableYears', 'chartData', 'chartYear', 'averageWater'));
    }
}
