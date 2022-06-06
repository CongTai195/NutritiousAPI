<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'process_id',
        'weight_log',
        'heart_rate_log',
        'blood_pressure_log',
        'is_enough'
    ];
}
