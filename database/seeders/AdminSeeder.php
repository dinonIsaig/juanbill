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
    
        $admins = [
            [
                'admin_id'    => 1,
                'first_name'  => 'John',
                'middle_name' => null,
                'last_name'   => 'Isaig',
                'email'       => 'dinonbonagua@example.com',
                'contact_no'  => '09171234567',
                'dob'         => '1990-01-01',
                'username'    => 'deenawnn',
                'password'    => 'password123',
            ],
            [
                'admin_id' => 2,
                'first_name' => 'Gwen',
                'middle_name' => null,
                'last_name' => 'Lee',
                'email' => 'gwen@example.com',
                'contact_no' => '09179876543',
                'dob' => '2004-12-09',
                'username' => 'hiaxynth',
                'password' => 'password123',
            ],
            [
                'admin_id' => 3,
                'first_name' => 'Joyrel',
                'middle_name' => null,
                'last_name' => 'Baladjay',
                'email' => 'joyrel@example.com',
                'contact_no' => '09179876544',
                'dob' => '2005-11-10',
                'username' => 'joyyirel',
                'password' => 'password123',
            ],
            [
                'admin_id' => 4,
                'first_name' => 'Avril',
                'middle_name' => null,
                'last_name' => 'Saliba',
                'email' => 'avril@example.com',
                'contact_no' => '09179876545',
                'dob' => '2004-04-14',
                'username' => 'ebreel',
                'password' => 'password123',
            ]
        ];

        for ($i = 0; $i < count($admins); $i++) {
            $a = $admins[$i];

            // Using updateOrCreate to prevent duplicates based on email
            Admin::updateOrCreate(
                ['email' => $a['email']],
                [
                    'admin_id'    => $a['admin_id'],
                    'first_name'  => $a['first_name'],
                    'middle_name' => $a['middle_name'],
                    'last_name'   => $a['last_name'],
                    'contact_no'  => $a['contact_no'],
                    'dob'         => $a['dob'],
                    'username'    => $a['username'],
                    'password'    => Hash::make($a['password']), // Password must be hashed for Auth::guard('admin')
                ]
            );
        }
    }
}
