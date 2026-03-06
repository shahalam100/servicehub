<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubService extends Model
{
    protected $fillable = ['category_id', 'name', 'description', 'price'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function providers()
    {
        return $this->belongsToMany(User::class, 'provider_sub_service');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
