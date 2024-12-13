<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Create users and add roles.
     */
    public function run(): void
    {
        //Create admin user
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'admin@admin',
            'password' => bcrypt('admin'),
            'email_verified_at' => now(),
        ]);
        $user->assignRole('Admin');

        //Create fake users
        User::factory()->count(5)->create();
    }
}
