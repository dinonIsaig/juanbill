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
        Schema::create('units', function (Blueprint $table) {
            $table->unsignedBigInteger('unit_id')->primary();

            // Unit Details
            $table->string('unit_area', 50)->nullable();
            $table->integer('bldg_no');
            $table->integer('floor_no');
            $table->integer('unit_no');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
