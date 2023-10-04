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
        Schema::create('cart_subs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cart_main_id')->nullable(); //id العميل
            $table->integer('store_id')->nullable(); //id العميل
            $table->decimal('cart_sub_subtotal', 8, 2)->default(0);
            $table->decimal('cart_sub_discount', 8, 2)->default(0);
            $table->decimal('cart_sub_total', 8, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_subs');
    }
};
