<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "code",
        "lat",
        "lon",
        "name",
        "city",
        "state",
        "country",
        "woeid",
        "iata",
        "country_iata",
        "tz",
        "phone",
        "type",
        "email",
        "url",
        "runway_length",
        "elev",
        "icao",
        "direct_flights",
        "carriers",
    ];
}
