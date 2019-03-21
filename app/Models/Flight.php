<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'airport_id',
    ];

    public function airport()
    {
        return $this->belongsTo(Airport::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function hasReachedMax()
    {
        return ($this->number_of_seats_available === 0);
    }
}
