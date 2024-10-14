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
        Schema::create('modellek', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('maker_id');
            $table->foreign('maker_id')->references('id')->on('makers');
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modellek');
    }
};
