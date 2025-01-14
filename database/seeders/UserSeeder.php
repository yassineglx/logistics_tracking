<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create specific roles
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'role' => 'Admin',
        ]);

        User::factory()->create([
            'name' => 'Transporter User',
            'email' => 'transporter@example.com',
            'role' => 'Transporter',
        ]);

        User::factory()->create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'role' => 'User',
        ]);

        // Create 10 random users with random roles
        User::factory(10)->create();
    }
}
