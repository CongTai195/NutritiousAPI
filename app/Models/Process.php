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
        'goal_weight',
        'weekly_goal',
        'activity_level',
        'BMR',
        'TDEE',
        'calories',
        'carbs',
        'fat',
        'protein'
    ];
}
