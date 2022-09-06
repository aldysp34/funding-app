<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kategori_kegiatans', function (Blueprint $table) {
            $table->BigInteger('budget')->nullable();
            $table->BigInteger('budget_diajukan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kategori_kegiatans', function (Blueprint $table) {
            //
        });
    }
};
