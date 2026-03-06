<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'customer_id',
        'provider_id',
        'sub_service_id',
        'address',
        'booking_date',
        'booking_time',
        'status'
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function provider()
    {
        return $this->belongsTo(User::class, 'provider_id');
    }

    public function subService()
    {
        return $this->belongsTo(SubService::class);
    }
}
