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
        Schema::create('properties_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->constrained('cities')->onDelete('CASCADE');
            /**
             * @see \App\Enums\PropertiesEnum
             */
            $table->string('property');
            /**
             * @see \App\Enums\ACtionTypeEnum
             */
            $table->string('action_type');
            $table->bigInteger('value');
            $table->bigInteger('value_before');
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
        Schema::dropIfExists('properties_transactions');
    }
};
