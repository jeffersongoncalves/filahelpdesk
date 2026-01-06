<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        if (Admin::query()->where('email', 'admin@filakit.com')->count() == 0) {
            Admin::factory()->create([
                'name' => 'Test Admin',
                'email' => 'admin@filakit.com',
            ]);
        }

        if (User::query()->where('email', 'user@filakit.com')->count() == 0) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'user@filakit.com',
            ]);
        }

        $this->call(StatusSeeder::class);
        $this->call(PrioritySeeder::class);
    }
}
