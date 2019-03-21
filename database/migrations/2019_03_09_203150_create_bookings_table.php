<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            
            $table->increments('id');

            $table->string('from_location');
            $table->string('to_location');
            $table->timestamp('depart_date')->nullable();
            $table->timestamp('return_date')->nullable();
            $table->integer('number_of_adults');
            $table->integer('number_of_children');
            $table->string('travel_class');
            $table->integer('travel_type');

            $table->string('origin_code');
            $table->string('destination_code');
            $table->timestamp('depart_date');
            $table->timestamp('arrive_date');

            $table->integer('duration_in_ms');
            $table->integer('amount');
            $table->string('currency_value');

            $table->integer('flight_id')->unsigned();
            $table->foreign('flight_id')->references('id')->on('flights');

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
        Schema::dropIfExists('bookings');
    }
}
