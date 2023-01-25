<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * @see \App\Enums\PropertiesEnum
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->constrained('cities')->onDelete('CASCADE');
            $table->bigInteger('population');
            $table->bigInteger('food');
            $table->bigInteger('iron');
            $table->bigInteger('wood');
            $table->bigInteger('stone');
            $table->bigInteger('swordsman');
            $table->bigInteger('archer');
            $table->bigInteger('knight');
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
        Schema::dropIfExists('city_properties');
    }
};
