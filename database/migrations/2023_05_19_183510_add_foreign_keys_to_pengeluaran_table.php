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
        Schema::table('pengeluaran', function (Blueprint $table) {
            $table->foreign('userspengeluaran_id')->references('id')->on('users');
            $table->foreign('kategoripengeluaran_id')->references('id')->on('kategoripengeluaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengeluaran', function (Blueprint $table) {
            $table->dropForeign(['userspengeluaran_id']);
            $table->dropForeign(['kategoripengeluaran_id']);
        });
    }
};
