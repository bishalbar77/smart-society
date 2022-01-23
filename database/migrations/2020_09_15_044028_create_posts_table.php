<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('phone1');
            $table->string('email1');
            $table->string('pincode1');
            $table->string('district1');
            $table->string('city1');
            $table->string('state1');
            $table->string('country1');
            $table->string('badd');
            $table->string('badd2')->nullable();
            $table->integer('is_active')->default(1);
            $table->string('type')->default('Service');
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
        Schema::dropIfExists('posts');
    }
}
