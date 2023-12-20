<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'admin',
                'password' => Hash::make('admin123'),
                'role' => 'admin'
            ],
            [
                'username' => 'kepala',
                'password' => Hash::make('kepala123'),
                'role' => 'admin'
            ],
            // [
            //     'username' => 'peserta',
            //     'password' => Hash::make('peserta123'),
            //     'role' => 'peserta'
            // ],
        ]);
    }
}
