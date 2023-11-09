<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VodContent;

class VodContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Public complete VODs
        VodContent::factory()->complete()->public()->count(10)->create();

        // Premium complete VODs
        VodContent::factory()->complete()->premium()->count(10)->create();
    }
}
