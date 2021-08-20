<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    use HasFactory;

    protected $fillable = ['nik', 'name', 'no_hp', 'birthday', 'gender', 'address', 'rt', 'rw', 'status'];

    public function family()
    {
        return $this->belongsTo(Family::class, 'family_id');
    }
}
