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
        Schema::create('main_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();//id العميل
            $table->decimal('main_discount',8,2)->default(0);
            $table->decimal('main_subtotal',8,2)->default(0);
            $table->decimal('main_total',8,2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('main_orders');
    }
};
