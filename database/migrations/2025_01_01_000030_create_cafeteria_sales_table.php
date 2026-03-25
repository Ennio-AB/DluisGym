<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cafeteria_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->decimal('total', 10, 2);
            $table->string('notes')->nullable();
            $table->timestamp('sold_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cafeteria_sales');
    }
};
