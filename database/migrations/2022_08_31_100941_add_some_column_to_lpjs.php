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
        Schema::table('lpjs', function (Blueprint $table) {
            $table->tinyInteger('verifikator_approved');
            $table->tinyInteger('ketuaHarian_approved');
            $table->unsignedBigInteger('verifikator_id')->nullable();
            $table->unsignedBigInteger('ketuaHarian_id')->nullable();

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
        Schema::table('lpjs', function (Blueprint $table) {
            $table->dropColumn('verifikator_approved');
            $table->dropColumn('ketuaHarian_approved');
            $table->dropColumn('verifikator_id');
            $table->dropColumn('ketuaHarian_id');
        });
    }
};
