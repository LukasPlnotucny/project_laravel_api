<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin',
            'surname' => 'admin',
            'is_admin' => true,
            'password' => bcrypt('admin'),
        ]);

        // Not admin
        User::factory()->create([
            'name' => 'user',
            'surname' => 'user',
            'email' => 'user',
            'password' => bcrypt('user'),
        ]);

        Order::factory(5)->create();
        Item::factory(10)->create();
    }
}
