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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
            $table->string('type');
            $table->string('size');
            $table->integer('status');
            $table->integer('ajukan_status');
            $table->integer('verifikator_approved');
            $table->integer('ketuaHarian_approved');
            $table->unsignedBigInteger('verifikator_id')->nullable();
            $table->unsignedBigInteger('ketuaHarian_id')->nullable();
            $table->unsignedBigInteger('kegiatan_id');
            $table->timestamps();

            $table->foreign('verifikator_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('ketuaHarian_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('files');
    }
};
