<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomAlloctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_alloctions', function (Blueprint $table) {
            $table->id();
            $table->string('society_id');
            $table->string('pck_id');
            $table->string('of_type');
            $table->string('block');
            $table->string('floor');
            $table->double('amount',8,2);
            $table->integer('no_of_jobs');
            $table->integer('no_of_ivnt');
            $table->integer('no_of_agent');
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
        Schema::dropIfExists('room_alloctions');
    }
}
