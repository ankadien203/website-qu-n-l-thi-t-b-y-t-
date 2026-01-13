<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acceptance extends Model
{
    protected $fillable = [
    'device_name',
    'technician_name',
    'repair_date',
    'acceptance_result',
    'accepted_by',
    'repair_type', //  thêm
];


}
