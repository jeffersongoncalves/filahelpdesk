<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    public function run(): void
    {
        if (Status::query()->count() > 0) {
            return;
        }
        Status::create(['name' => 'Pending', 'color' => '#e69900']);
        Status::create(['name' => 'Solved', 'color' => '#15a000']);
        Status::create(['name' => 'Bug', 'color' => '#f40700']);
    }
}
