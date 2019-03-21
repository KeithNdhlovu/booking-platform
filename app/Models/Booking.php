<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from_location',
        'to_location',
        'depart_date',
        'return_date',
        'number_of_adults',
        'number_of_children',
        'travel_class',
        'travel_type',
        'flight_id',
        'origin_code',
        'destination_code',
        'depart_date',
        'arrive_date',
    ];


    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }
}
