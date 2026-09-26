<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Food extends Model
{
    protected $table = 'foods';

    protected $fillable = [
        'name',
        'calories',
        'protein',
        'carbs',
        'fat',
        'serving_size',
    ];

    public function mealItems(): HasMany
    {
        return $this->hasMany(MealItem::class);
    }
}