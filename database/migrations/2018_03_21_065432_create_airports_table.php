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
            $table->string("lat")->nullable();
            $table->string("lon")->nullable();
            $table->string("name")->nullable();
            $table->string("city")->nullable();
            $table->string("state")->nullable();
            $table->string("country")->nullable();
            $table->string("woeid")->nullable();
            $table->string("tz")->nullable();
            $table->string("phone")->nullable();
            $table->string("type")->nullable();
            $table->string("email")->nullable();
            $table->string("url")->nullable();
            $table->string("runway_length")->nullable();
            $table->string("elev")->nullable();
            $table->string("icao")->nullable();
            $table->string("iata")->nullable();
            $table->string("country_iata")->nullable();
            $table->string("direct_flights")->nullable();
            $table->string("carriers")->nullable();
            
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
