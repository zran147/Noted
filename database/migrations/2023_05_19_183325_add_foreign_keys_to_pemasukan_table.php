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
        Schema::table('pemasukan', function (Blueprint $table) {
            $table->foreign('userspemasukan_id')->references('id')->on('users');
            $table->foreign('kategoripemasukan_id')->references('id')->on('kategoripemasukan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemasukan', function (Blueprint $table) {
            $table->dropForeign(['userspemasukan_id']);
            $table->dropForeign(['kategoripemasukan_id']);
        });
    }
};
