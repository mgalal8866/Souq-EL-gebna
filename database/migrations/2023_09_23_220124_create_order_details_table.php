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
            $table->integer('order_id')->nullable();
            $table->integer('item_id')->nullable();
            $table->decimal('qty')->default(0);
            $table->decimal('price',8,2)->default(0);
            $table->decimal('total',8,2)->default(0);
            $table->decimal('discount',8,3)->nullable();//الخصم
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
