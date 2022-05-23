<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips_tbl', function (Blueprint $table) {
            $table->id('trips_id');
            $table->integer('driver_id');
            $table->string('trips_origin');
            $table->string('trips_destination');
            $table->integer('trips_passenger');
            $table->string('trips_bodynum');
            $table->integer('trips_isArchived');
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
        Schema::dropIfExists('trips');
    }
}
