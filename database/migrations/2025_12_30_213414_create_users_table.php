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
        Schema::create('users', function (Blueprint $table) {
        $table->id('user_id');

        $table->foreignId('unit_id')->unique()->constrained(table: 'units', column: 'unit_id')->onDelete('cascade');

        $table->string('username', 50)->unique();
        $table->string('email', 100)->unique();
        $table->string('password');

        $table->string('first_name', 50);
        $table->string('last_name', 50);
        $table->string('middle_name', 50)->nullable();
        $table->string('contact_no', 15)->unique();
        $table->date('dob');

    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
