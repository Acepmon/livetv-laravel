<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ShortContent;

class ShortContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Public complete SHORTs
        ShortContent::factory()->complete()->public()->count(10)->create();

        // Premium complete SHORTs
        ShortContent::factory()->complete()->premium()->count(10)->create();
    }
}
