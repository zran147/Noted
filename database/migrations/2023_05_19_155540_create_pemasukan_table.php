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
        Schema::create('pemasukan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userspemasukan_id')->nullable();
            // $table->foreign('userspemasukan_id')->references('id')->on('users');
            $table->unsignedBigInteger('kategoripemasukan_id')->nullable();
            // $table->foreign('kategoripemasukan_id')->references('id')->on('kategoripemasukan');
            $table->unsignedDecimal('pemasukan_nominal', 20, 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemasukan');
    }
};
