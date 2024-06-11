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
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('itemId');
            $table->unsignedBigInteger('invoiceId');
            $table->unsignedBigInteger('packageId');
            $table->integer('quantity');
            // $table->decimal('price', 11, 2);
            
            // Define foreign keys
            $table->foreign('itemId')->references('id')->on('items')->onDelete('cascade');
            $table->foreign('invoiceId')->references('id')->on('invoices')->onDelete('cascade');
            $table->foreign('packageId')->references('id')->on('packages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_items');
    }
};
