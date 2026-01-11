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
        Schema::create('log_payment_updates', function (Blueprint $table) {

            $table->id('update_id')->primary();
            $table->uuid('bill_id');
            $table->integer('amount')->nullable();
            $table->text('message');
            $table->dateTime('update_date');


        });
    }

    public function down(): void
    {
        Schema::dropIfExists('log_payment_updates');
    }
};
