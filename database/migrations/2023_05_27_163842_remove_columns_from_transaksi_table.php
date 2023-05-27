<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnsFromTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            // Drop the userspemasukan_id and kategoripemasukan_id columns
            $table->dropColumn(['userspemasukan_id', 'kategoripemasukan_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaksi', function (Blueprint $table) {
            // Recreate the userspemasukan_id and kategoripemasukan_id columns
            $table->unsignedBigInteger('userspemasukan_id')->nullable();
            $table->unsignedBigInteger('kategoripemasukan_id')->nullable();
            
            // Add foreign key constraints if needed
            
            // Uncomment the following lines if you want to add foreign key constraints
           
            $table->foreign('userspemasukan_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('kategoripemasukan_id')
                ->references('id')
                ->on('kategoripemasukan')
                ->onDelete('cascade');

        });
    }
}
