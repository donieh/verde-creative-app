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
            $table->integer('itemId', 11)->unsigned();
            $table->integer('invoiceId', 11)->unsigned();
            $table->integer('packageId', 11)->unsigned();
            $table->integer('quantity');
            $table->decimal('price', 11, 2);
            $table->foreign('itemId')->references('id')->on('items');
            $table->foreign('invoiceId')->references('id')->on('invoices');
            $table->foreign('packageId')->references('id')->on('packages');
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
