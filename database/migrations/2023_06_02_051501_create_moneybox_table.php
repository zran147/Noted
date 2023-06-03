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
        Schema::create('moneybox', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usersmoneybox_id')->constrained('users');
            $table->string('judul_moneybox');
            $table->decimal('target_moneybox', 12, 2);
            $table->decimal('nominal_moneybox', 12, 2);
            $table->timestamp('tanggal_selesai')->nullable();
            $table->timestamps();
            $table->string('slug')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moneybox');
    }
};
