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
        // Get available years for the dropdown (Distinct years from DB)
        $availableYears = Bill::where('user_id', Auth::id())
            ->where('type', 'Rent')
            ->selectRaw('YEAR(due_date) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        // Start the Query
        $query = Bill::where('user_id', Auth::id())
                    ->where('type', 'Rent');

        // Apply Filters if present in URL
        if ($request->filled('year') && $request->input('year') !== 'all') {
            $query->whereYear('due_date', $request->input('year'));
        }

        if ($request->filled('month') && $request->input('month') !== 'all') {
            $query->whereMonth('due_date', $request->input('month'));
        }

        if ($request->filled('status') && $request->input('status') !== 'all') {
            $query->where('status', $request->input('status'));
        }

        // Execute Query with Pagination
        $bills = $query->orderBy('due_date', 'desc')->paginate(10)->withQueryString(); // withQueryString to filter during pagination

        return view('user.rent', compact('bills', 'availableYears',));
    }
}
