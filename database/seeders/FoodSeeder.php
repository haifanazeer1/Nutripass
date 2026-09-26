<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    public function run(): void
    {
        Food::create([
            'name' => 'Boiled Egg',
            'calories' => 78,
            'protein' => 6.3,
            'carbs' => 0.6,
            'fat' => 5.3,
            'serving_size' => '1 egg',
        ]);

        Food::create([
            'name' => 'Chicken Breast',
            'calories' => 165,
            'protein' => 31,
            'carbs' => 0,
            'fat' => 3.6,
            'serving_size' => '100g',
        ]);

        Food::create([
            'name' => 'White Rice',
            'calories' => 130,
            'protein' => 2.7,
            'carbs' => 28,
            'fat' => 0.3,
            'serving_size' => '100g',
        ]);

        Food::create([
            'name' => 'Banana',
            'calories' => 89,
            'protein' => 1.1,
            'carbs' => 22.8,
            'fat' => 0.3,
            'serving_size' => '100g',
        ]);

        Food::create([
            'name' => 'Oats',
            'calories' => 389,
            'protein' => 16.9,
            'carbs' => 66.3,
            'fat' => 6.9,
            'serving_size' => '100g',
        ]);

        Food::create([
            'name' => 'Milk',
            'calories' => 61,
            'protein' => 3.2,
            'carbs' => 4.8,
            'fat' => 3.3,
            'serving_size' => '100ml',
        ]);

        Food::create([
            'name' => 'Apple',
            'calories' => 52,
            'protein' => 0.3,
            'carbs' => 13.8,
            'fat' => 0.2,
            'serving_size' => '100g',
        ]);

        Food::create([
            'name' => 'Paneer',
            'calories' => 265,
            'protein' => 18.3,
            'carbs' => 1.2,
            'fat' => 20.8,
            'serving_size' => '100g',
        ]);
    }
}