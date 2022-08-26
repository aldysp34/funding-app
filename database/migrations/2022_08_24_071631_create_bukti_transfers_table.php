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
        Schema::create('bukti_transfers', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penerima');
            $table->string('npwp_penerima');
            $table->longText('alamat_penerima');
            $table->string('rekening_penerima');
            $table->BigInteger('nominal');
            $table->date('date_of_transaction');
            $table->string('filename');
            $table->string('type');
            $table->string('size');
            $table->unsignedBigInteger('bank_id');
            $table->timestamps();

            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bukti_transfers');
    }
};
