<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'brutto',
        'file',
        'job'
    ];

    public function setBruttoAttribute($value)
    {
        $this->attributes['brutto'] = $value * 1000;
    }

    public function getBruttoAttribute($value)
    {
        return $value / 1000;
    }
}
