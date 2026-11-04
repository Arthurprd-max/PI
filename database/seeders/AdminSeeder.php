<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->updateOrInsert(
            ['email' => 'admin@gmail.com'],
            [
                'password' => Hash::make('1234'),
                'is_admin' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
