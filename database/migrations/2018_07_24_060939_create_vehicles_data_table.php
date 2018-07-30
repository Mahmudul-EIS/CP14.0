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
            $table->integer('user_id');
            $table->enum('own_vehicle', ['0', '1'])->nullable();
            $table->string('car_type')->nullable();
            $table->string('car_plate_no');
            $table->string('luggage_limit')->nullable();
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
