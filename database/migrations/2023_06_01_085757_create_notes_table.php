<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('judul_note');
            $table->string('slug')->nullable()->unique();
            $table->text('isi_note');
            $table->string('kategori_note');
            $table->timestamp('tanggal_pembuatan_note')->nullable();
            $table->timestamps();
            $table->foreignId('kategorinotes_id')->nullable()->constrained('kategorinotes');
            $table->foreignId('user_id')->nullable()->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
