<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => env('ADMIN_EMAIL', 'admin@dluisgym.com')],
            [
                'name' => 'Administrador',
                'password' => Hash::make(env('ADMIN_PASSWORD', 'Admin1234!')),
                'role' => 'admin',
                'is_active' => true,
            ]
        );
    }
}
