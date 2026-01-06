<?php

namespace Database\Seeders;

use App\Models\Priority;
use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    public function run(): void
    {
        if (Priority::query()->count() > 0) {
            return;
        }
        Priority::create(['name' => 'Low', 'color' => '#069900']);
        Priority::create(['name' => 'Normal', 'color' => '#e1d200']);
        Priority::create(['name' => 'Critical', 'color' => '#e10000']);
    }
}
