<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaryFoodDetail extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'diary_id', 'serving_size_food_id', 'quantity', 'meal'];
}
