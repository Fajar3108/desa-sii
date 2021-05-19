<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillageInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'description',
        'no_hp', 'email',
        'start_day',
        'end_day',
        'start_time',
        'end_time'
    ];

    protected $casts = [
        'start_time' => 'date:hh:mm',
        'end_time' => 'date:hh:mm'
    ];
}
