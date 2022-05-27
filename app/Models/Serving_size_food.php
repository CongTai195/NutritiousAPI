<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serving_size_food extends Model
{
    use HasFactory;

    protected $fillable = [
        'calories',
        'fat',
        'cholesterol',
        'sodium',
        'carbs',
        'protein',
        'calcium',
        'iron',
        'potassium',
        'vitamin_D',
        'vitamin_A',
        'vitamin_C',
    ];
}
