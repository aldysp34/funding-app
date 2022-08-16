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
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('budget');
            $table->unsignedBigInteger('bidang_id');
            $table->unsignedBigInteger('ketuaBidang_id')->nullable();
            $table->timestamps();

            $table->foreign('bidang_id')->references('id')->on('bidangs')->onDelete('cascade');
            $table->foreign('ketuaBidang_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kegiatans');
    }
};
