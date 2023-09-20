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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name')->nullable();
            $table->string('password')->nullable();
            $table->string('phone')->unique();
            $table->string('phone1')->nullable();
            $table->string('store_name')->nullable();
            $table->string('logo')->nullable();
            $table->string('img1')->nullable();
            $table->string('img2')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->string('balance')->default(0)->nullable();
            $table->integer('region')->nullable();
            $table->string('address')->nullable();
            $table->timestamp('date_payment')->nullable();
            $table->boolean('featured')->default(1)->nullable();
            $table->boolean('sales_active')->default(1)->nullable();
            $table->integer('type_activity')->nullable();
            $table->boolean('rating_view')->default(1);
            $table->boolean('active')->default(1)->nullable();
            $table->integer('question1_id')->nullable();
            $table->integer('question2_id')->nullable();
            $table->string('answer1')->nullable();
            $table->string('answer2')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
