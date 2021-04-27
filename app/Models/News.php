<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
