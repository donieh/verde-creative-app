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
            $table->string('code', 50);
            $table->date('invoiceDate');
            $table->string('quantity', 11, 2);
            $table->decimal('totalPrice', 11, 2);
            $table->decimal('subTotal', 11, 2);
            $table->decimal('discount',11, 2);
            $table->decimal('downPayment', 11, 2);
            $table->decimal('grandTotal', 11, 2);
            $table->date('startDate');
            $table->date('endDate');
            $table->date('dueDate');
            $table->timestamps();
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
