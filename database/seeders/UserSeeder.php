<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=> 'admin',
            'email'=> 'admin@hotel.com',
            'password'=> hash::make('admin123'),
            'role'=> 'admin',
        ]);

        User::create([
            'name'=> 'staff',
            'email'=> 'staff@hotel.com',
            'password'=> hash::make('staff123'),
            'role'=> 'staff',
        ]);
    }
}
