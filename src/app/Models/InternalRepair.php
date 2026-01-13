<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternalRepair extends Model
{
    use HasFactory;

    protected $fillable = [
        'device_name',
        'repair_date',
        'fault',
        'repair_content',
        'technician_name',
    ];
}

