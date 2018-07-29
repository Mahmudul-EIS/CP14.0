<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRideOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ride_offers', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('offer_by');
        $table->string('origin');
        $table->string('destination');
        $table->dateTime('arrival_time');
        $table->dateTime('departure_time');
        $table->string('price_per_seat');
        $table->integer('total_seats');
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
        Schema::dropIfExists('ride_offers');
    }
}
