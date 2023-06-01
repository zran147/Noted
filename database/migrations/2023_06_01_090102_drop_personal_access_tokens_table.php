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
        Schema::dropIfExists('personal_access_tokens');
    }
    

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::create('personal_access_tokens', function (Blueprint $table) {
        // Define the table structure here
        // ...
    });
}
};
