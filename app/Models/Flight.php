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
        'code',
        'max_number_of_seats',
        'number_of_seats_available'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function hasReachedMax()
    {
        return ($this->number_of_seats_available === 0);
    }
}
