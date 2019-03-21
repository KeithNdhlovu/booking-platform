<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserOrder extends Model
{
    public function passenger()
    {
        return $this->belongsTo(Passenger::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
