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
        // Schema::create('carts', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->integer('user_id')->nullable();//id العميل
        //     $table->integer('item_id')->nullable();
        //     $table->decimal('qty')->default(0);
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('carts');
    }
};
