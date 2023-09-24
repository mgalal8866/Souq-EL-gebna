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
        Schema::create('header_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->nullable();//id العميل
            $table->decimal('discount',8,2)->default(0);
            $table->decimal('subtotal',8,2)->default(0);
            $table->decimal('total',8,2)->default(0);
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('header_orders');
    }
};
