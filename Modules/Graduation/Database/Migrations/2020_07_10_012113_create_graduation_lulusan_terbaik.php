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
            $table->string('title');
            $table->unsignedBigInteger('lulusan_prodi_id');
            $table->unsignedBigInteger('prodi_id');
            $table->enum('kategori',['IPK','JSDP']);
            $table->text('prestasi');
            $table->string('testimoni');
            $table->unsignedBigInteger('tahun_id');
            $table->timestamps();

            $table->foreign('lulusan_prodi_id')->on('graduation_lulusan_prodi')->references('id')->onDelete('cascade');
            $table->foreign('prodi_id')->on('profil_prodi')->references('id')->onDelete('cascade');
            $table->foreign('tahun_id')->on('graduation_tahun')->references('id')->onDelete('cascade');
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
            $table->dropForeign(['lulusan_prodi_id']);
        });
        Schema::table('graduation_lulusan_terbaik', function (Blueprint $table) {
            $table->dropForeign(['prodi_id']);
        });
        Schema::table('graduation_lulusan_terbaik', function (Blueprint $table) {
            $table->dropForeign(['tahun_id']);
        });
        Schema::dropIfExists('graduation_lulusan_terbaik');
    }
}
