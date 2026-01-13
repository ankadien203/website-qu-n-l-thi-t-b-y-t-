<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaultReport extends Model
{
    protected $fillable = [
        'user_id',
        'device_id',
        'device_name',
        'unit',
        'quantity',
        'quantity_text',
        'location',
        'device_status',
        'department',
        'sent_to',
        'description',
        'status',
        'evaluation',//thêm vào
        'evaluation_note',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
    public function technician()
{
    return $this->belongsTo(User::class, 'technician_id');
}

}
