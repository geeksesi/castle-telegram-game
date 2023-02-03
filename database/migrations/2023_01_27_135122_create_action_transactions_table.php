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
        Schema::create('action_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('city_id')->constrained('cities')->onDelete('CASCADE');
            /**
             * @see \App\Enums\ACtionTypeEnum
             */
            $table->string('action_type');
            $table->foreignId('by_city')->constrained('cities')->onDelete('SET NULL');
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
        Schema::dropIfExists('action_transactions');
    }
};
