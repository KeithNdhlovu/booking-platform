<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
        
    /**
     * Show the default booking page
     * 
     * @return \Illuminate\Http\Response
     */
    public function booking()
    {
        return view('booking.index');
    }

        
    /**
     * Show flights availability
     * 
     * @return \Illuminate\Http\Response
     */
    public function availability()
    {
        dd("List of flights");
        return view('booking.list');
    }
}
