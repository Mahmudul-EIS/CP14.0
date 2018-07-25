<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles_data', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ride_offer_id');
            $table->string('own_vehicle');
            $table->string('car_type');
            $table->string('car_plate_no');
            $table->string('luggage_no');
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
        Schema::dropIfExists('vehicles_data');
    }
}
