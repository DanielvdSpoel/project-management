<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Daniel van der Spoel',
            'email' => 'contact@danielvdspoel.nl',
            'password' => bcrypt('password'),
            ]);
        $user->assignRole('super_admin');
    }
}
