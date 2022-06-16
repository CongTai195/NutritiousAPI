<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiaryWaterDetail extends Model
{
    use HasFactory;

    protected $fillable = ['diary_id', 'amount'];
}
