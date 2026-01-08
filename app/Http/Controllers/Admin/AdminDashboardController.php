<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        $currentYear = $request->input('year', date('Y'));

        $elecBills = Bill::where('type', 'Electricity')->whereYear('due_date', $currentYear)->get();
        $elecData = $this->aggregateMonthlyData($elecBills);

        $waterBills = Bill::where('type', 'water')->whereYear('due_date', $currentYear)->get();
        $waterData = $this->aggregateMonthlyData($waterBills);

        return view('admin.dashboard', compact(
            'elecData',
            'waterData',
            'currentYear'
        ));
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
