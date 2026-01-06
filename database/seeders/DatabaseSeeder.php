<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Agent;
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

        if (Agent::query()->where('email', 'agent@filakit.com')->count() == 0) {
            Agent::factory()->create([
                'name' => 'Test Agent',
                'email' => 'agent@filakit.com',
            ]);
        }

        $this->call(StatusSeeder::class);
        $this->call(PrioritySeeder::class);
        $this->call(CategorySeeder::class);
    }
}
