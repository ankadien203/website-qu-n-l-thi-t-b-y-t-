<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Davice extends Model
{
    protected $fillable = [
        'name',
        'unit',
        'quantity',
        'location',
        'status',
    ];
}
