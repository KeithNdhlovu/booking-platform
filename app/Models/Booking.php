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
        'origin',
        'destination',
        'origin_code',
        'destination_code',
        'depart_date',
        'return_date',
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
