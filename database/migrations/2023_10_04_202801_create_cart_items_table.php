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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cart_sub_id')->nullable();
            $table->integer('item_id')->nullable();
            $table->decimal('cart_item_price', 8, 2)->default(0);
            $table->decimal('cart_item_qty')->default(0);
            $table->decimal('cart_item_subtotal', 8, 3)->nullable();
            $table->decimal('cart_item_discount', 8, 3)->nullable(); //الخصم
            $table->decimal('cart_item_total', 8, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
