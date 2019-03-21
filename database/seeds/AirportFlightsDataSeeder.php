<?php

use App\Models\Airport;
use App\Models\Flight;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class AirportFlightsDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Lets start by creating a couple of Airports
        $path = Storage::disk('local')->path("data/airports.json");

        if (!File::exists($path)) {
           dd("Airports JSON file does not exist!");
        }

        $airports = json_decode(File::get($path));

        dd($airports);

        foreach($airports as $_airport) {
            $airport = Airport::create([
                $_airport
            ]);

            // Lets create a few flights for this airport

        }


        // Now lets create the main flights that operate between these Airports
        $path = Storage::disk('local')->path("data/flights.json");
        
        if (!File::exists($path)) {
            dd("Flights JSON file does not exist!");
        }
    }
}
