<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create();

        for ($i = 0; $i < 10; $i++) {
            $dish = Dish::factory()->create();

            $user->likedDishes()->attach($dish);
        }
    }
}
