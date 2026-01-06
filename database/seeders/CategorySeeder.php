<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        if (Category::query()->count() > 0) {
            return;
        }
        Category::create(['name' => 'Technical', 'color' => '#0014f4']);
        Category::create(['name' => 'Billing', 'color' => '#2b9900']);
        Category::create(['name' => 'Customer Services', 'color' => '#7e0099']);
    }
}
