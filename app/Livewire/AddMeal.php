<?php

namespace App\Livewire;

use App\Models\Food;
use App\Models\Meal;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddMeal extends Component
{
    public $mealType = 'Breakfast';

    public $foodId = '';

    public $quantity = 1;

    public function addMeal()
    {
        $this->validate([
            'mealType' => 'required|in:Breakfast,Lunch,Dinner,Snack',
            'foodId' => 'required|exists:foods,id',
            'quantity' => 'required|numeric|min:0.1',
        ]);

        $meal = Meal::firstOrCreate([
            'user_id' => Auth::id(),
            'meal_type' => $this->mealType,
            'meal_date' => today(),
        ]);

        $meal->items()->create([
            'food_id' => $this->foodId,
            'quantity' => $this->quantity,
        ]);

        $this->reset('foodId', 'quantity');

        $this->quantity = 1;

        session()->flash('success', 'Meal added successfully!');
    }

    public function render()
    {
        return view('livewire.add-meal', [
            'foods' => Food::orderBy('name')->get(),
        ]);
    }
}