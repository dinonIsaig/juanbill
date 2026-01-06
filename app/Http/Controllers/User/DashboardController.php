<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();

        $currentYear = $request->input('year', date('Y'));

        $elecBills = Bill::where('user_id', $userId)->where('type', 'Electricity')->whereYear('due_date', $currentYear)->get();
        $elecData = $this->aggregateMonthlyData($elecBills);

        $waterBills = Bill::where('user_id', $userId)->where('type', 'water')->whereYear('due_date', $currentYear)->get();
        $waterData = $this->aggregateMonthlyData($waterBills);

        $upcomingBills = Bill::where('user_id', $userId)
            ->where('status', 'Unpaid')
            ->where('due_date', '>=', now())
            ->orderBy('due_date', 'asc')
            ->limit(5)
            ->get();

        $recentPaidBills = Bill::where('user_id', $userId)
            ->where('status', 'Paid')
            ->where('date_paid', '>=', now()->subMonths(3))
            ->orderBy('date_paid', 'desc')
            ->paginate(10);

        return view('user.dashboard', compact('elecData', 'waterData', 'upcomingBills', 'currentYear', 'recentPaidBills'));
    }

    private function aggregateMonthlyData($bills) {
        $data = array_fill(0, 12, 0);
        foreach ($bills as $bill) {
            if ($bill->due_date && $bill->consumption) {
                $data[$bill->due_date->month - 1] += $bill->consumption;
            }
        }
        return $data;
    }
}
