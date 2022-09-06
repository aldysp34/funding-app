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
        Schema::create('lpjs', function (Blueprint $table) {
            $table->id();
            $table->string('filename');
            $table->string('type');
            $table->string('size');
            $table->string('folder_path');
            $table->unsignedBigInteger('file_id');
            $table->tinyInteger('verifikator_approved');
            $table->tinyInteger('ketuaHarian_approved');
            $table->unsignedBigInteger('verifikator_id')->nullable();
            $table->unsignedBigInteger('ketuaHarian_id')->nullable();
            $table->timestamps();

            $table->foreign('verifikator_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('ketuaHarian_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lpjs');
    }
};
