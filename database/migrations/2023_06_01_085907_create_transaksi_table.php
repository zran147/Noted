<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('userstransaksi_id')->constrained('users');
            $table->string('judul_transaksi');
            $table->foreignId('kategoritransaksi_id')->constrained('kategoritransaksi');
            $table->decimal('nominal_transaksi', 12, 2);
            $table->enum('jenis_transaksi', ['pemasukan', 'pengeluaran']);
            $table->timestamps();
            $table->string('slug')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
