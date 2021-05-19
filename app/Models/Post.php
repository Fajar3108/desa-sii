<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ["title", "description", "thumbnail"];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
