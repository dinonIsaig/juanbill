<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AssocTransac;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AssocTransactionController extends Controller
{
    public function index(): View
    {
        $transactions = AssocTransac::latest()->paginate(5);
        return view('admin.association', compact('transactions'));
    }

    public function adminAdd(): View 
    {
        return view('components.add-modal');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'TransactionID' => 'required|unique:assoctransac,TransactionID',
            'DueDate'       => 'required|date',
            'DatePaid'      => 'nullable|date',
            'Amount'        => 'required|numeric',
            'Unit'          => 'required|integer',
            'Status'        => 'required|string',
        ]);

        AssocTransac::create($request->all());

        return redirect()->route('admin.association.index')
                        ->with('success', 'Transaction created successfully');
    }

    public function edit(AssocTransac $transaction): View
    {
        return view('admin.edit-modal', compact('transaction'));
    }

    public function update(Request $request, AssocTransac $transaction): RedirectResponse
    {
        $request->validate([
            'DueDate'   => 'required|date',
            'DatePaid'  => 'nullable|date',
            'Amount'    => 'required|numeric',
            'Unit'      => 'required|integer',
            'Status'    => 'required|string',
        ]);

        $transaction->update($request->all());

        return redirect()->route('admin.association')
                        ->with('success', 'Transaction updated successfully');
    }

    public function destroy(Request $request, $id) // Use $id instead of Type-hinting
    {
        $transaction = AssocTransac::where('TransactionID', $id)->first();

        if (!$transaction) {
            return redirect()->back()->with('error', 'Transaction ID not found.');
        }

        $transaction->delete();

        return redirect()->route('admin.association.index')
                        ->with('success', 'Transaction deleted successfully');
    }
}