<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complains', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('flat_no');
            $table->string('phone');
            $table->string('ticket');
            $table->string('issue');
            $table->string('type');
            $table->string('subject');
            $table->integer('is_active')->default(1);
            $table->integer('is_assigned')->default(1);
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
        Schema::dropIfExists('complains');
    }
}
