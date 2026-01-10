<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        Admin::updateOrCreate(
        ['admin_id' => 1001],
        [
            'username' => 'testadmin',
            'first_name' => 'Test',
            'last_name' => 'Account',
            'email' => 'test@example.com',
            'contact_no' => '09123456789',
            'dob' => '2000-01-01',
            'password' => Hash::make('password123'), // He can log in with this
            'is_registered' => true, 
        ]
    );

        // adminID for signup
        $adminIds = [1002, 1003, 1004, 1005, 1006];

        foreach ($adminIds as $id) {
            // updateOrCreate ensures we don't create duplicates if seeder runs twice
            Admin::updateOrCreate(
                ['admin_id' => $id], 
                ['is_registered' => false,]// all other fields remain NULL
            );// set is_registered to false for new slots
        }
    }
}