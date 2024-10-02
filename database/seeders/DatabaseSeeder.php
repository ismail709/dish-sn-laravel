<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([UserSeeder::class, DishSeeder::class]);

        $users = User::all();
        $dishes = Dish::all();

        $dishes->each(function ($dish) use ($users) {
            $users->first()->likedDishes()->attach($dish->id);
        });
    }
}
