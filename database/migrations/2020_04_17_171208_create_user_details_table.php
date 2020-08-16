<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->timestamp('hospital')->nullable();
            $table->timestamp('jail')->nullable();
            $table->bigInteger('points')->nullable();
            $table->bigInteger('rates')->nullable();
            $table->bigInteger('rank_id');
            $table->bigInteger('money');
            $table->bigInteger('level_id');
            $table->bigInteger('location_id');
            $table->bigInteger('realestate')->nullable();
            $table->timestamp('travel_started')->nullable();
            $table->bigInteger('active_course')->nullable();
            $table->timestamp('course_started')->nullable();
            $table->bigInteger('job')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_details');
    }
}
