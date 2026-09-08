<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@eskalaber.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'phone' => '081234567890',
            'address' => 'Jl. Admin No. 1',
            'is_active' => true,
        ]);

        User::create([
            'name' => 'Petugas Gudang',
            'email' => 'petugas@eskalaber.com',
            'password' => Hash::make('petugas123'),
            'role' => 'petugas',
            'phone' => '081234567891',
            'address' => 'Jl. Petugas No. 2',
            'is_active' => true,
        ]);

        User::create([
            'name' => 'John Peminjam',
            'email' => 'peminjam@eskalaber.com',
            'password' => Hash::make('peminjam123'),
            'role' => 'peminjam',
            'phone' => '081234567892',
            'address' => 'Jl. Peminjam No. 3',
            'is_active' => true,
        ]);
    }
}