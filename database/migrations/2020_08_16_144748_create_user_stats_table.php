<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_stats', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->double('strength')->default(10);
            $table->double('defense')->default(10);
            $table->double('agility')->default(10);
            $table->double('endurance')->default(10);
            $table->bigInteger('hp')->default(100);
            $table->bigInteger('max_hp')->default(100);
            $table->bigInteger('energy')->default(100);
            $table->bigInteger('max_energy')->default(100);
            $table->bigInteger('nerve')->default(100);
            $table->bigInteger('max_nerve')->default(100);
            $table->bigInteger('will')->default(100);
            $table->bigInteger('max_will')->default(100);
            $table->bigInteger('intelligence')->default(100);
            $table->decimal('level_experience', 10, 0)->default(10);
            $table->decimal('bust_experience', 10, 0)->default(10);
            $table->decimal('heal_experience', 10, 0)->default(10);
            $table->decimal('attack_experience', 10, 0)->default(10);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_stats');
    }
}
