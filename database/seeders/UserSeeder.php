<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = [
            [
                'unit_id' => 3301,
                'first_name' => 'John Dinon',
                'middle_name' => null,
                'last_name' => 'Isaig',
                'email' => 'dinonbonagua@example.com',
                'contact_no' => '09171234567',
                'username' => 'deenawnn',
                'password' => 'password123',
                'dob' => '2004-10-04',
            ],
            [
                'unit_id' => 3302,
                'first_name' => 'Gwen',
                'middle_name' => null,
                'last_name' => 'Lee',
                'email' => 'gwen@example.com',
                'contact_no' => '09179876543',
                'username' => 'hiaxynth',
                'password' => 'password123',
                'dob' => '2004-12-09',
            ],
            [
                'unit_id' => 3303,
                'first_name' => 'Joyrel',
                'middle_name' => null,
                'last_name' => 'Baladjay',
                'email' => 'joyrel@example.com',
                'contact_no' => '09179876544',
                'username' => 'joyyirel',
                'password' => 'password123',
                'dob' => '2005-11-10',
            ],
            [
                'unit_id' => 3304,
                'first_name' => 'Avril',
                'middle_name' => null,
                'last_name' => 'Saliba',
                'email' => 'avril@example.com',
                'contact_no' => '09179876545',
                'username' => 'ebreel',
                'password' => 'password123',
                'dob' => '2004-04-14',
            ]
        ];

        for ($i = 0; $i < count($users); $i++) {
            $u = $users[$i];

            User::updateOrCreate(
                ['email' => $u['email']],
                [
                    'unit_id' => $u['unit_id'] ?? null,
                    'first_name' => $u['first_name'] ?? null,
                    'middle_name' => $u['middle_name'] ?? null,
                    'last_name' => $u['last_name'] ?? null,
                    'contact_no' => $u['contact_no'] ?? null,
                    'username' => $u['username'] ?? null,
                    'password' => $u['password'] ?? 'password',
                    'dob' => $u['dob'] ?? null,
                ]
            );
        }
    }
}
