<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nama'     => 'Administrator',
            'username' => 'admin',
            'password' => Hash::make('password'),
            'role'     => 'Admin',
        ]);

        User::create([
            'nama'     => 'Operator Sekolah',
            'username' => 'operator',
            'password' => Hash::make('password'),
            'role'     => 'Operator',
        ]);
    }
}
