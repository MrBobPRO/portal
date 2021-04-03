<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    public function companyNews($query)
    {
        $query->where('type', true);
    }
    public function worldNews($query)
    {
        $query->where('type', false);
    }
}
