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
        $airportNames = collect(['OR Tambo International', 'Cape Town International', 'Lanceria']);
        
        $path = Storage::disk('local')->path("data/airports.json"); //storage_path() . "/data/airports.json";

        if (!File::exists($path)) {
           dd("Airports JSON file does not exist!");
        }

        $airports = json_decode(File::get($path)); //json_decode(file_get_contents($path), true); 

        dd($airports);

        foreach($airportNames as $airportName) {
            $airport = Airport::create([
                'name' => $airportName,
                'location' => $airportName,
            ]);

            // Lets create a few flights for this airport

        }
    }
}
