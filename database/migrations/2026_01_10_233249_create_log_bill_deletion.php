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
        Schema::create('log_payment_delete', function (Blueprint $table) {

            $table->id('delete_id')->primary();
            $table->uuid('bill_id');
            $table->text('message');
            $table->dateTime('deletion_date');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('log_payment_delete');
    }
};
