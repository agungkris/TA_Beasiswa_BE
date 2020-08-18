<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraduationLulusanTerbaik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graduation_lulusan_terbaik', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_lulusan');
            $table->string('prestasi');
            $table->text('testimoni');
            $table->unsignedBigInteger('tahun');
            $table->timestamps();

            $table->foreign('id_lulusan')->on('graduation_lulusan_prodi')->references('id')->onDelete('cascade');
            $table->foreign('tahun')->on('graduation_tahun')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('graduation_lulusan_terbaik', function (Blueprint $table) {
            $table->dropForeign(['id_lulusan']);
        });
        Schema::table('graduation_lulusan_terbaik', function (Blueprint $table) {
            $table->dropForeign(['tahun']);
        });
        Schema::dropIfExists('graduation_lulusan_terbaik');
    }
}
