<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugToPemasukanTable extends Migration
{
    public function up()
    {
        Schema::table('pemasukan', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('judul_pemasukan');
        });
    }

    public function down()
    {
        Schema::table('pemasukan', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}
