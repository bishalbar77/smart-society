<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountSetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_setups', function (Blueprint $table) {
            $table->id();
            $table->Integer('user_id');
            $table->Integer('data');
            $table->Integer('users');
            $table->string('subdomain')->nullable();
            $table->string('company')->nullable();
            $table->string('lang')->nullable();
            $table->string('time')->nullable();
            $table->string('email')->nullable();
            $table->string('custom')->nullable();
            $table->string('role')->nullable();
            $table->string('cron')->nullable();
            $table->string('personal')->nullable();
            $table->string('mullti')->nullable();
            $table->string('login')->nullable();
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
        Schema::dropIfExists('account_setups');
    }
}
