<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LiveContent;

class LiveContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Public started live contents
        LiveContent::factory()->public()->live()->count(10)->create();

        // Public ended live contents
        LiveContent::factory()->public()->ended()->count(10)->create();
    }
}
