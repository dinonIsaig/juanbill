<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminRentController extends Controller
{
    public function index(Request $request)
    {

        $availableYears = Bill::where('type', 'Rent')->selectRaw('YEAR(due_date) as year')->distinct()->orderBy('year', 'desc')->pluck('year');

        $query = Bill::where('type', 'Rent');

        if ($request->filled('year') && $request->input('year') !== 'all') {
            $query->whereYear('due_date', $request->input('year'));
        }

        if ($request->filled('month') && $request->input('month') !== 'all') {
            $query->whereMonth('due_date', $request->input('month'));
        }

        if ($request->filled('status') && $request->input('status') !== 'all') {
            $query->where('status', $request->input('status'));
        }

        $bills = $query->with('user')->orderBy('due_date', 'desc')->paginate(10)->withQueryString(); // withQueryString to filter during pagination

        $chartYear = $request->input('chart_year', date('Y'));
        
        $monthlyBills = Bill::where('type', 'Rent')->whereYear('due_date', date('Y')) ->get();

        $chartData = array_fill(0, 12, 0);
        foreach ($monthlyBills as $bill) {
            $monthIndex = $bill->due_date->month - 1;
            $chartData[$monthIndex] += $bill->consumption;
        }

        return view('admin.rent', compact('bills', 'availableYears', 'chartData'));
    }

    public function create(): View 
    {
        return view('components.add-modal');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'due_date'       => 'required|date',
            'date_paid'      => 'nullable|date',
            'amount'        => 'required|numeric',
            'unit_id'          => 'required|integer|exists:users,unit_id',
            'status'        => 'required|string',
        ]);

        $user = User::where('unit_id', $request->unit_id)->first();

        $data = $request->except('unit_id'); 
        $data['user_id'] = $user->id;    
        $data['type'] = 'Rent';  

        Bill::create($data);

        return redirect()->route('admin.rent')
                        ->with('success', 'Transaction created successfully');
    }

    public function edit(): View
    {
        return view('components.edit-modal');
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
                    'TransactionID' => 'required|string',
                    'due_date'       => 'required|date',
                    'date_paid'      => 'nullable|date',
                    'status'        => 'required|string',
                ]);
                
        $bill = Bill::where('id', $request->TransactionID)->first();

        if (!$bill) {
            return redirect()->back()->with('error', 'Transaction not found.');
        }

        $bill->update([
                'due_date'  => $request->due_date,
                'date_paid' => $request->date_paid,
                'status'    => $request->status,
            ]);

        return redirect()->route('admin.rent')
                         ->with('success', 'Transaction updated successfully');
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

    return redirect()->route('admin.rent')
                        ->with('success', 'Transaction deleted successfully');
    }
}
