<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BillSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Get all User IDs
        $user_ids = DB::table('users')->pluck('id');

        // 2. Define Rates
        $water_rate = 35.00;   // Per cubic meter
        $elec_rate = 12.00;    // Per kWh
        $rent_price = 15000.00; // Fixed monthly rent
        $assoc_fee = 2500.00;   // Fixed monthly association dues

        $bills = [];

        foreach ($user_ids as $user_id) {

            // Initialize simulated meter readings (starts 2 years ago)
            $water_meter = 100;
            $elec_meter = 1000;

            // Loop for the last 24 months
            for ($i = 23; $i >= 0; $i--) {

                $billing_date = Carbon::now()->subMonths($i)->startOfMonth();
                $due_date = $billing_date->copy()->addDays(15);

                // Logic: Old bills are paid, current month (0) is unpaid
                $is_old = $i > 0;
                $status = $is_old ? 'Paid' : 'Unpaid';
                $paid_date = $is_old ? $due_date->copy()->subDays(rand(1, 5)) : null;
                $pay_method = $is_old ? ($i % 2 == 0 ? 'Online Payment' : 'Cash') : null;

                // --- 1. WATER BILL ---
                $water_usage = rand(10, 30);
                $water_amount = $water_usage * $water_rate;
                $water_start = $water_meter;
                $water_meter += $water_usage;

                $bills[] = [
                    'id' => Str::uuid()->toString(),
                    'user_id' => $user_id,
                    'type' => 'Water',
                    'status' => $status,
                    'amount' => $water_amount,
                    'due_date' => $due_date,
                    'consumption' => $water_usage,
                    'reading_start' => $billing_date,
                    'reading_end' => $billing_date->copy()->endOfMonth(),
                    'date_paid' => $paid_date,
                    'payment_method' => $pay_method,
                    'created_at' => $billing_date,
                    'updated_at' => $billing_date,
                ];

                // --- 2. ELECTRICITY BILL ---
                $elec_usage = rand(150, 350);
                $elec_amount = $elec_usage * $elec_rate;
                $elec_start = $elec_meter;
                $elec_meter += $elec_usage;

                $bills[] = [
                    'id' => Str::uuid()->toString(),
                    'user_id' => $user_id,
                    'type' => 'Electricity',
                    'status' => $status,
                    'amount' => $elec_amount,
                    'due_date' => $due_date,
                    'consumption' => $elec_usage,
                    'reading_start' => $billing_date,
                    'reading_end' => $billing_date->copy()->endOfMonth(),
                    'date_paid' => $paid_date,
                    'payment_method' => $pay_method,
                    'created_at' => $billing_date,
                    'updated_at' => $billing_date,
                ];

                // --- 3. RENT BILL ---
                $bills[] = [
                    'id' => Str::uuid()->toString(),
                    'user_id' => $user_id,
                    'type' => 'Rent',
                    'status' => $status,
                    'amount' => $rent_price,
                    'due_date' => $due_date,
                    'consumption' => null,
                    'reading_start' => null,
                    'reading_end' => null,
                    'date_paid' => $paid_date,
                    'payment_method' => $pay_method,
                    'created_at' => $billing_date,
                    'updated_at' => $billing_date,
                ];

                // --- 4. ASSOCIATION DUES (Added) ---
                $bills[] = [
                    'id' => Str::uuid()->toString(),
                    'user_id' => $user_id,
                    'type' => 'Association Dues',
                    'status' => $status,
                    'amount' => $assoc_fee,
                    'due_date' => $due_date,
                    'consumption' => null, // Dues are fixed, no meter reading
                    'reading_start' => null,
                    'reading_end' => null,
                    'date_paid' => $paid_date,
                    'payment_method' => $pay_method,
                    'created_at' => $billing_date,
                    'updated_at' => $billing_date,
                ];
            }
        }

        // Insert in chunks of 500 to stay fast and memory efficient
        foreach (array_chunk($bills, 500) as $chunk) {
            DB::table('bills')->insert($chunk);
        }
    }
}
