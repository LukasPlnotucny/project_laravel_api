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
        Schema::create('item_order', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->nullable()->constrained('items')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('order_id')->nullable()->constrained('orders')->cascadeOnUpdate()->nullOnDelete();
            $table->integer('quantity')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_order');
    }
};
