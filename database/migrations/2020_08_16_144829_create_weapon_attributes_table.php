<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeaponAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weapon_attributes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('strength');
            $table->decimal('fire_rate', 10, 0);
            $table->decimal('accuracy', 10, 0);
            $table->bigInteger('hp');
            $table->bigInteger('energy');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weapon_attributes');
    }
}
