<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'detail',
        'fromCarbs',
        'fromProtein',
        'fromFat',
        'imageURL',
        'user_id'
    ];
}
