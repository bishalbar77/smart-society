<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_number');
            $table->string('vehicle_type')->nullable();
            $table->integer('society_id')->nullable();
            $table->string('Driving_license_photo')->nullable();
            $table->string('pollution_photo')->nullable();
            $table->string('status')->nullable();
            $table->timestamp('in_time');
            $table->timestamp('out_time')->nullable();
            $table->string('user_type')->nullable();
            $table->string('user_name')->nullable();
            $table->string('vehicle_pass')->nullable();
            $table->string('user_number')->nullable();
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
        Schema::dropIfExists('vehicles');
    }
}
