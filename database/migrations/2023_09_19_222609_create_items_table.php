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
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('img')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('brand_id')->nullable();
            $table->string('min_qty')->nullable();
            $table->string('max_qty')->nullable();
            $table->string('stock_qty')->nullable();
            $table->string('price_salse')->nullable();
            $table->string('price_offer')->nullable();
            $table->boolean('is_offer')->default(0);
            $table->timestamp('exp_date')->nullable();
            $table->timestamp('pro_date')->nullable();
            $table->string('description')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('active_admin')->default(1);
            $table->boolean('rating_view')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
