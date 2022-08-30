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
        Schema::create('rincian_biaya_updates', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('volume_1');
            $table->string('satuan_1');
            $table->BigInteger('volume_2')->nullable();
            $table->string('satuan_2')->nullable();
            $table->BigInteger('volume_3')->nullable();
            $table->string('satuan_3')->nullable();
            $table->BigInteger('harga_satuan');
            $table->BigInteger('jumlah');
            $table->unsignedBigInteger('kegiatan_id');
            $table->timestamps();

            $table->foreign('kegiatan_id')->references('id')->on('kegiatans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rincian_biaya_updates');
    }
};
