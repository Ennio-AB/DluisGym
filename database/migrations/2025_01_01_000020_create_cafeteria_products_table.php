<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cafeteria_products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('category');
            $table->decimal('sale_price', 8, 2);
            $table->decimal('cost_price', 8, 2);
            $table->unsignedInteger('stock')->default(0);
            $table->unsignedInteger('min_stock')->default(5);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cafeteria_products');
    }
};
