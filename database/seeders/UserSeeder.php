<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'password' => Hash::make('admin123'),
                'name'     => 'Admin User',
                'role'     => 'administrator',
            ],
            [
                'username' => 'marketer',
                'password' => Hash::make('marketer123'),
                'name'     => 'Marketing User',
                'role'     => 'marketing',
            ],
            [
                'username' => 'salesperson',
                'password' => Hash::make('sales123'),
                'name'     => 'Sales User',
                'role'     => 'sales',
            ],
        ]);
    }
}
