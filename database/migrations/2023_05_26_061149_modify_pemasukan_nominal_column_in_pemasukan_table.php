<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('pemasukan', function (Blueprint $table) {
            $table->decimal('pemasukan_nominal', 10, 2)->change();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('pemasukan', function (Blueprint $table) {
            $table->decimal('pemasukan_nominal', 20, 3)->change();
        });
    }
    
};
