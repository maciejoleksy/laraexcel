<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{   
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'name',
        'bio',
        'born_date',
        'dead_date',
        'nobel',
    ];
}
