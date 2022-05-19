<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaryExerciseDetail extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'diary_id', 'exercise_id', 'duration'];
}
