<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cafeteria_sale_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sale_id')->constrained('cafeteria_sales')->cascadeOnDelete();
            $table->foreignId('product_id')->constrained('cafeteria_products')->restrictOnDelete();
            $table->unsignedInteger('quantity');
            $table->decimal('unit_price', 8, 2);
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cafeteria_sale_items');
    }
};
