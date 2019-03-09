<?php

namespace App\Http\Controllers;

class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view('landing');
    }

    
    /**
     * Show the default test home page
     * 
     * @return \Illuminate\Http\Response
     */
    public function booking()
    {
        return view('booking');
    }
}
