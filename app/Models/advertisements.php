<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class advertisements extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'typeof',
        'salary',
        'place',
        'description'
    ];
}

