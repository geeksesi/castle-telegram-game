<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_building_states', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('farm')->unsigned();
            $table->smallInteger('wood_cutter')->unsigned();
            $table->smallInteger('quarry')->unsigned();
            $table->smallInteger('iron_mine')->unsigned();
            $table->smallInteger('warehouse')->unsigned();
            $table->smallInteger('municipality')->unsigned();
            $table->smallInteger('army_camp')->unsigned();
            $table->smallInteger('market')->unsigned();
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
        Schema::dropIfExists('city_building_states');
    }
};
