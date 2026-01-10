<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminElectricityController extends Controller
{
    public function index(Request $request)
    {
        // Get available years for the dropdown
        $availableYears = Bill::where('type', 'Electricity')
            ->selectRaw('YEAR(due_date) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        // Main Table Query (Filters)
        $query = Bill::where('type', 'Electricity');

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

        $monthlyElectricityAverage = Bill::where('type', 'Electricity')
            ->whereYear('due_date', $chartYear)
            ->selectRaw('MONTH(due_date) as month, AVG(consumption) as average_value')
            ->groupBy('month')
            ->get();

        foreach ($monthlyElectricityAverage as $data) {
            $chartData[$data->month - 1] = $data->average_value;
        }

        $averageElectricity = number_format(collect($chartData)->filter()->avg(), 2);

        return view('admin.electricity', compact('bills', 'availableYears', 'chartData', 'chartYear', 'averageElectricity'));
    }

    public function create(): View
    {
        return view('components.add-modal');
    }

    public function store(Request $request)
    {
        $request->validate([
            'due_date' => 'required|date',
            'date_paid' => 'nullable|date',
            'amount'   => 'required|numeric',
            'unit_id'  => 'required|integer|exists:users,unit_id',
            'status'   => 'required|string',
        ]);

        $user = User::where('unit_id', $request->unit_id)->first();
        $date = Carbon::parse($request->due_date);

        // Background Calculations
        Bill::create([
            'user_id'       => $user->id,
            'type'          => 'Electricity',
            'amount'        => $request->amount,
            'due_date'      => $request->due_date,
            'status'        => $request->status,
            'date_paid'     => $request->date_paid,
            'consumption'   => $request->amount / 12, // Electricity Rate
            'reading_start' => $date->copy()->startOfMonth(),
            'reading_end'   => $date->copy()->endOfMonth(),
        ]);

        return redirect()->route('admin.electricity')->with('success', 'Transaction added successfully');
    }

    public function edit(): View
    {
        return view('components.edit-modal');
    }

    public function update(Request $request)
    {
        $request->validate([
            'TransactionID' => 'required|exists:bills,id',
            'status'        => 'required|string',
            'date_paid'     => 'nullable|date',
        ]);

        $bill = Bill::findOrFail($request->TransactionID);
        $bill->update($request->only(['status', 'date_paid']));

        return redirect()->route('admin.electricity')->with('success', 'Transaction updated');
    }

    public function destroy(Request $request)
    {
    $request->validate([
        'TransactionID' => 'required|string'
    ]);

    $bill = Bill::where('id', $request->TransactionID)->first();

    if (!$bill) {
        return redirect()->back()->with('error', 'Transaction ID not found.');
    }

    $bill->delete();

    return redirect()->route('admin.electricity')
                        ->with('success', 'Transaction deleted successfully');
    }


}
