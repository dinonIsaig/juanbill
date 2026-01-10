<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\User; // Ensure User model is imported

class TestPayment extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['username' => 'Overdue'],
            [
                'unit_id' => 3305,
                'first_name' => 'Palautang',
                'middle_name' => null,
                'last_name' => 'Utang',
                'email' => 'testforpayment@example.com',
                'contact_no' => '09171231222',
                'password' => Hash::make('Password123'),
                'dob' => '2004-10-04'
            ]
        );

        $userId = $user->user_id;

        // 2. Define Rates
        $water_rate = 35.00;
        $elec_rate = 12.00;
        $rent_price = 15000.00;
        $assoc_fee = 2500.00;

        $bills = [];

        // Meter readings starting point
        $water_meter = 500;
        $elec_meter = 5000;

        // Generate Bills: 5 Months Overdue + 1 Month Unpaid (Total 6 loops)
        // Loop from 5 down to 0.
        // 5,4,3,2,1 = Overdue (Past)
        // 0 = Unpaid (Current)
        for ($i = 5; $i >= 0; $i--) {

            $billing_date = Carbon::now()->subMonths($i)->startOfMonth();

            if ($i > 0) {
                $status = 'Overdue';
                // Due date was in the past (e.g., 15th of that past month)
                $due_date = $billing_date->copy()->addDays(15);
            } else {
                $status = 'Unpaid';
                $due_date = Carbon::now()->addDays(10);
            }

            // --- 1. WATER BILL ---
            $water_usage = rand(15, 25);
            $water_amount = $water_usage * $water_rate;

            $bills[] = [
                'bill_id' => Str::uuid()->toString(),
                'user_id' => $userId,
                'type' => 'Water',
                'status' => $status,
                'amount' => $water_amount,
                'due_date' => $due_date,
                'consumption' => $water_usage,
                'reading_start' => $billing_date,
                'reading_end' => $billing_date->copy()->endOfMonth(),
                'date_paid' => null,
                'payment_method' => null
            ];
            $water_meter += $water_usage;

            // --- 2. ELECTRICITY BILL ---
            $elec_usage = rand(200, 300);
            $elec_amount = $elec_usage * $elec_rate;

            $bills[] = [
                'bill_id' => Str::uuid()->toString(),
                'user_id' => $userId,
                'type' => 'Electricity',
                'status' => $status,
                'amount' => $elec_amount,
                'due_date' => $due_date,
                'consumption' => $elec_usage,
                'reading_start' => $billing_date,
                'reading_end' => $billing_date->copy()->endOfMonth(),
                'date_paid' => null,
                'payment_method' => null
            ];
            $elec_meter += $elec_usage;

            // --- 3. RENT BILL ---
            $bills[] = [
                'bill_id' => Str::uuid()->toString(),
                'user_id' => $userId,
                'type' => 'Rent',
                'status' => $status,
                'amount' => $rent_price,
                'due_date' => $due_date,
                'consumption' => null,
                'reading_start' => null,
                'reading_end' => null,
                'date_paid' => null,
                'payment_method' => null
            ];

            // --- 4. ASSOCIATION DUES ---
            $bills[] = [
                'bill_id' => Str::uuid()->toString(),
                'user_id' => $userId,
                'type' => 'Association Dues',
                'status' => $status,
                'amount' => $assoc_fee,
                'due_date' => $due_date,
                'consumption' => null,
                'reading_start' => null,
                'reading_end' => null,
                'date_paid' => null,
                'payment_method' => null
            ];
        }

        // Insert Data
        DB::table('bills')->insert($bills);
    }
}
