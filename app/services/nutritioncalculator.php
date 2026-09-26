<?php

namespace App\Services;

use App\Models\Profile;

class NutritionCalculator
{
    public function calculate(Profile $profile): array
    {
        // Calculate BMR using the Mifflin-St Jeor equation
        if ($profile->gender === 'male') {
            $bmr = (10 * $profile->weight)
                + (6.25 * $profile->height)
                - (5 * $profile->age)
                + 5;
        } else {
            $bmr = (10 * $profile->weight)
                + (6.25 * $profile->height)
                - (5 * $profile->age)
                - 161;
        }

        // Activity multiplier
        $activityMultipliers = [
            'sedentary' => 1.2,
            'light' => 1.375,
            'moderate' => 1.55,
            'active' => 1.725,
            'very_active' => 1.9,
        ];

        $multiplier = $activityMultipliers[$profile->activity_level] ?? 1.2;

        // Estimated daily energy expenditure
        $tdee = $bmr * $multiplier;

        // Adjust calories according to goal
        $calories = match ($profile->goal) {
            'weight_loss' => $tdee - 500,
            'weight_gain' => $tdee + 300,
            'muscle_gain' => $tdee + 300,
            default => $tdee,
        };

        // Protein target: approximately 1.6g per kg body weight
        $protein = $profile->weight * 1.6;

        // Fat target: approximately 25% of calories
        $fatCalories = $calories * 0.25;
        $fat = $fatCalories / 9;

        // Remaining calories are assigned to carbohydrates
        $proteinCalories = $protein * 4;
        $carbCalories = $calories - $proteinCalories - $fatCalories;
        $carbs = $carbCalories / 4;

        return [
            'bmr' => round($bmr),
            'tdee' => round($tdee),
            'calories' => max(round($calories), 1200),
            'protein' => round($protein),
            'carbs' => round($carbs),
            'fat' => round($fat),
        ];
    }
}