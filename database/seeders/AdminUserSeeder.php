<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        if (!User::where('email', 'tholhas1992@gmail.com')->exists()) {
            User::create([
                'name' => 'Admin Tadaima',
                'email' => 'tholhas1992@gmail.com',
                'password' => Hash::make('admin'),
                'is_admin' => true,
            ]);
        }
    }
}
