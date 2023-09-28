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
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sub_order_id')->nullable();
            $table->integer('item_id')->nullable();
            $table->decimal('details_price', 8, 2)->default(0);
            $table->decimal('details_qty')->default(0);
            $table->decimal('details_subtotal', 8, 3)->nullable();
            $table->decimal('details_discount', 8, 3)->nullable(); //الخصم
            $table->decimal('details_total', 8, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
