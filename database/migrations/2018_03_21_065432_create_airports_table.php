<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airports', function (Blueprint $table) {
            $table->increments('id');
            $table->string("code");
            $table->string("lat");
            $table->string("lon");
            $table->string("name");
            $table->string("city");
            $table->string("state");
            $table->string("country");
            $table->string("woeid");
            $table->string("tz");
            $table->string("phone");
            $table->string("type");
            $table->string("email");
            $table->string("url");
            $table->string("runway_length");
            $table->string("elev");
            $table->string("icao");
            $table->string("iata");
            $table->string("country_iata");
            $table->string("direct_flights");
            $table->string("carriers");
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airports');
    }
}
