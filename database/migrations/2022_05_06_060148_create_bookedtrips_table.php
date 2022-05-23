<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookedtripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserve_trip_tbl', function (Blueprint $table) {
            $table->id('reserve_id');
            $table->integer('trips_id');
            $table->integer('users_id');
            $table->string('reserve_current');
            $table->string('reserve_destination');
            $table->string('reserve_description');
            $table->string('reserve_status');
            $table->string('reserve_timestamp');
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
        Schema::dropIfExists('bookedtrips');
    }
}
