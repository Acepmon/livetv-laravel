<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // Make admin user
        \App\Models\User::factory()->admin()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
        ]);

        // Make creator user
        \App\Models\User::factory()->creator()->create([
            'name' => 'Creator',
            'email' => 'creator@gmail.com',
        ]);

        // Make test users
        \App\Models\User::factory()->user()->create([
            'name' => 'User 1',
            'email' => 'user1@gmail.com',
        ]);
        \App\Models\User::factory()->user()->create([
            'name' => 'User 2',
            'email' => 'user2@gmail.com',
        ]);
        \App\Models\User::factory()->user()->create([
            'name' => 'User 3',
            'email' => 'user3@gmail.com',
        ]);
        \App\Models\User::factory()->user()->create([
            'name' => 'User 4',
            'email' => 'user4@gmail.com',
        ]);
        \App\Models\User::factory()->user()->create([
            'name' => 'User 5',
            'email' => 'user5@gmail.com',
        ]);
        \App\Models\User::factory()->user()->create([
            'name' => 'User 6',
            'email' => 'user6@gmail.com',
        ]);
        \App\Models\User::factory()->user()->create([
            'name' => 'User 7',
            'email' => 'user7@gmail.com',
        ]);
        \App\Models\User::factory()->user()->create([
            'name' => 'User 8',
            'email' => 'user8@gmail.com',
        ]);
    }
}
