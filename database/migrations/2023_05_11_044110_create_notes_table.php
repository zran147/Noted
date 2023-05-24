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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('judul_note'); 
            $table->string('slug')->nullable()->unique();
            $table->text('isi_note');
            $table->string('kategori_note')->default('Other');
            $table->timestamp('tanggal_pembuatan_note')->nullable();
            // $table->unsignedBigInteger('kategorinotes_id')->nullable();
            // $table->foreign('kategorinotes_id')->references('id')->on('kategorinotes');
            $table->timestamps();
            DB::table('migrations')->insert([
                'migration' => '2023_05_11_044110_create_notes_table',
                'batch' => 1,
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
