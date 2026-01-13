<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExternalRepair extends Model
{
    protected $fillable = [
    'device_name',
    'quantity',
    'supplier_company',
    'requested_by',
    'status',
    'technician_name', //  thêm
];

}
