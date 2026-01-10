<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
        $table->uuid('id')->primary();

        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

        $table->enum('type', ['Water', 'Electricity', 'Association Dues', 'Rent']);
        $table->enum('status', ['Paid', 'Unpaid', 'Overdue', 'Pending'])->default('Unpaid');
        $table->decimal('amount', 10, 2);
        $table->date('due_date');

        $table->integer('consumption')->nullable();
        $table->date('reading_start')->nullable();
        $table->date('reading_end')->nullable();

        $table->date('date_paid')->nullable();

        $table->enum('payment_method', ['Cash', 'Online Payment'])->nullable();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
