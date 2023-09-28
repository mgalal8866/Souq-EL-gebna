<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('sub_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('main_order_id')->nullable();//id العميل
            $table->integer('store_id')->nullable();//id العميل
            $table->decimal('sub_subtotal',8,2)->default(0);
            $table->decimal('sub_discount',8,2)->default(0);
            $table->decimal('sub_total',8,2)->default(0);
            $table->integer('sub_statu_delivery')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
