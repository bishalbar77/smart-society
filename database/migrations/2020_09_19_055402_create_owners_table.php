<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ownership')->nullable();
            $table->string('flat_no')->nullable();
            $table->Integer('society_id')->default(1);
            $table->string('bgroup')->nullable();
            $table->string('ltname');
            $table->string('country');
            $table->string('dob');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('district');
            $table->string('state');
            $table->string('city');
            $table->string('pincode');
            $table->string('add');
            $table->string('aadhar');
            $table->string('pan');
            $table->string('citizen_type');
            $table->string('resident')->nullable();
            $table->string('image')->nullable();
            $table->string('file')->nullable();
            $table->string('m_option_1');
            $table->string('type')->default('Owner');
            $table->integer('is_active')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('owners');
    }
}
