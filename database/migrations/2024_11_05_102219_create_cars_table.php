<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('maker_id');
            $table->foreign('maker_id')->references('id')->on('makers')->onDelete("cascade");
            $table->unsignedBigInteger('model_id');
            $table->foreign('model_id')->references('id')->on('models')->onDelete("cascade");
            $table->unsignedBigInteger('fuel_id');
            $table->foreign('fuel_id')->references('id')->on('fuels')->onDelete("cascade");
            $table->unsignedBigInteger('gear_id');
            $table->foreign('gear_id')->references('id')->on('gear_shifts')->onDelete("cascade");
            $table->unsignedBigInteger('body_id');
            $table->foreign('body_id')->references('id')->on('bodies')->onDelete("cascade");
            $table->unsignedBigInteger('color_id');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
