<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Fixed data
        $this->call(UserSeeder::class);

        // Random data
        $this->call(ChannelSeeder::class);
        $this->call(LiveContentSeeder::class);
        $this->call(VodContentSeeder::class);
        $this->call(ShortContentSeeder::class);
    }
}
