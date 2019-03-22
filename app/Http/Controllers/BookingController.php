<?php

namespace App\Http\Controllers;

use File;
use Storage;
use Validator;
use Carbon\Carbon;
use App\Models\Flight;
use App\Models\Airport;
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
        $data = [
            'airports' => Airport::all()
        ];

        return view('booking.index', $data);
    }

    /**
     * Show the default booking page
     * 
     * @return \Illuminate\Http\Response
     */
    public function showList()
    {
        $path = Storage::disk('local')->path("data/available.json");

        if (!File::exists($path)) {
           dd("JSON file does not exist!");
        }

        $response = json_decode(File::get($path));

        $data = [
            'data' => $response,
            'departDate' => Carbon::now()->format('Y-m-d'),
            'airports' => Airport::all()
        ];

        return view('booking.list', $data);
    }

    private function getFlights($requestData) {

        $correlation_id = "zz47cba96527220b4bba79396187d102";
        $language = "en";

        $url = "https://www.travelstart.co.za/webapi/search/?language={$language}&correlation_id={$correlation_id}";

        $options = array(
            'http' => array(
                'method'  => 'POST',
                'content' => json_encode( $requestData ),
                'header'=>  "Content-Type: application/json\r\n" .
                            "Accept: application/json\r\n"
            )
        );
        

        $context  = stream_context_create( $options );

        $result = file_get_contents( $url, false, $context );

        $response = json_decode( $result );

        return $response;
    }
        
    /**
     * Show flights availability
     * 
     * @return \Illuminate\Http\Response
     */
    public function availability(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data,
            [
                "tripType"      => "required",
                "origin"        => "required",
                "destination"   => "required",
                "depart_date"   => "required",
                "return_date"   => "required_if:tripType,return",
                "adult_count"   => "required",
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $origin = Airport::whereCode($data['origin'])->first();
        $destination = Airport::whereCode($data['destination'])->first();

        // dd($data);
        // dd($origin);

        if (!$origin || !$destination) {
            return back()->withErrors(['Unable to determine origin or destination from our database, please try again later!'])->withInput();
        }

        $origin->origin_display_name = "{$origin->city} ({$origin->code})";
        $destination->origin_display_name = "{$destination->city} ({$destination->code})";

        if ($request->input('tripType') == "oneway") {

            $postData = array (
                "tripType" => "oneway",
                "travellers" => array(
                  "adults"=> $data["adult_count"],
                  "children"=> $data["children_count"],
                  "infants"=> "0"
                ),
                "itineraries" => array(
                  array(
                    "departDate" => $data["depart_date"],
                    "origin" => array(
                      "value" => array(
                        "type" => $origin->type,
                        "city" => $origin->city,
                        "airport" => "All Airports",
                        "iata" => $origin->iata,
                        "code" => $origin->code,
                        "country" => $origin->country,
                        "countryIata" => $origin->countryIata,
                      ),
                      "display" => $origin->origin_display_name
                    ),
                    "destination" => array(
                      "value" => array(
                        "type" => $destination->type,
                        "city" => $destination->city,
                        "airport" => "All Airports",
                        "iata" => $destination->iata,
                        "code" => $destination->code,
                        "country" => $destination->country,
                        "countryIata" => $destination->countryIata,
                      ),
                      "display" => $destination->origin_display_name
                    )
                  )
                ),
                "locale" => array(
                  "country" => "ZA",
                  "currentLocale" => "en"
                )
            );

        } else {
            
            $postData = array (
                "tripType" => "oneway",
                "travellers" => array(
                "adults"=> $data["adult_count"],
                "children"=> $data["children_count"],
                "infants"=> "0"
                ),
                "itineraries" => array(
                array(
                    "departDate" => $data["depart_date"],
                    "returnDate" => $data["return_date"],
                    "origin" => array(
                    "value" => array(
                        "type" => $origin->type,
                        "city" => $origin->city,
                        "airport" => "All Airports",
                        "iata" => $origin->iata,
                        "code" => $origin->code,
                        "country" => $origin->country,
                        "countryIata" => $origin->countryIata,
                    ),
                    "display" => $origin->origin_display_name
                    ),
                    "destination" => array(
                    "value" => array(
                        "type" => $destination->type,
                        "city" => $destination->city,
                        "airport" => "All Airports",
                        "iata" => $destination->iata,
                        "code" => $destination->code,
                        "country" => $destination->country,
                        "countryIata" => $destination->countryIata,
                    ),
                    "display" => $destination->origin_display_name
                    )
                )
                ),
                "locale" => array(
                "country" => "ZA",
                "currentLocale" => "en"
                )
            );

        }

        $data = [
            'data' => $this->getFlights($postData)
        ];

        return view('booking.list', $data);
    }
}
