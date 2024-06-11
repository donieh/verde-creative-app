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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clientId');
            $table->unsignedBigInteger('staffId');
            $table->date('invoiceDate');
            $table->decimal('discount', 11, 2);
            $table->decimal('downPayment', 11, 2);
            $table->date('startDate');
            $table->date('endDate');
            $table->date('dueDate');
            
            // Define foreign keys
            $table->foreign('clientId')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('staffId')->references('id')->on('staff')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
