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
            $table->double('strength');
            $table->double('defense');
            $table->double('agility');
            $table->double('endurance');
            $table->bigInteger('hp');
            $table->bigInteger('max_hp');
            $table->bigInteger('energy');
            $table->bigInteger('max_energy');
            $table->bigInteger('nerve');
            $table->bigInteger('max_nerve');
            $table->bigInteger('will');
            $table->bigInteger('max_will');
            $table->bigInteger('intelligence');
            $table->decimal('level_experience', 10, 0);
            $table->decimal('bust_experience', 10, 0);
            $table->decimal('heal_experience', 10, 0);
            $table->decimal('attack_experience', 10, 0);


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
