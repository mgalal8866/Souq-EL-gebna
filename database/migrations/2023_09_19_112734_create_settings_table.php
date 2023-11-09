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
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('maintenance')->nullable();
            $table->string('logo')->nullable();
            $table->string('name')->nullable();
            $table->string('splash')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone1')->nullable();
            $table->boolean('active_salse')->nullable();
            $table->text('policy')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
