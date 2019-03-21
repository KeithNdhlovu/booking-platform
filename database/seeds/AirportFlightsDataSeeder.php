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

        foreach($airports as $_airport) {
            
            $airport = Airport::whereCode($_airport->code)->first();

            if (!$airport) {
            
                Airport::create([
                    "code" => $_airport->code,
                    "lat" => $_airport->lat,
                    "lon" => $_airport->lon,
                    "name" => $_airport->name,
                    "city" => $_airport->city,
                    "state" => $_airport->state,
                    "country" => $_airport->country,
                    "woeid" => $_airport->woeid,
                    "iata" => $_airport->iata,
                    "country_iata" => $_airport->country_iata,
                    "tz" => $_airport->tz,
                    "phone" => $_airport->phone,
                    "type" => $_airport->type,
                    "email" => $_airport->email,
                    "url" => $_airport->url,
                    "runway_length" => $_airport->runway_length,
                    "elev" => $_airport->elev,
                    "icao" => $_airport->icao,
                    "direct_flights" => $_airport->direct_flights,
                    "carriers" => $_airport->carriers,
                ]);

                $this->command->info('Creating Airport: '.$_airport->name);
            }
        }

        $this->command->info('Finished Creating Airports ...');


        // Now lets create the main flights that operate between these Airports
        $path = Storage::disk('local')->path("data/flights.json");
        
        if (!File::exists($path)) {
            dd("Flights JSON file does not exist!");
        }

        $flights = json_decode(File::get($path));

        foreach($flights as $_flight) {
            
            $flight = Flight::whereCode($_flight->code)->first();

            if (!$flight) {
                
                Flight::create([
                    'name' => $_flight->name,
                    'code' => $_flight->code,
                    'max_number_of_seats' => $_flight->max_number_of_seats,
                    'number_of_seats_available' => $_flight->number_of_seats_available,
                ]);

                $this->command->info('Creating Flight: '.$_flight->name);
            }
        }

        $this->command->info('Finished Creating Flights');
    }
}
