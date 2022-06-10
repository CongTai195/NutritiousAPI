<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'height',
        'starting_weight',
        'current_weight',
        'goal_weight',
        'weekly_goal',
        'activity_level',
        'BMR',
        'TDEE',
        'calories',
        'carbs',
        'fat',
        'protein',
        'cholesterol',
        'sodium',
        'calcium',
        'iron',
        'potassium',
        'vitamin_A',
        'vitamin_C',
        'vitamin_D',

    ];
}
