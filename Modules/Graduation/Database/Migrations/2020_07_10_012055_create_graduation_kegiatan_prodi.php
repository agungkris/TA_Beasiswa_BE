<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraduationKegiatanProdi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graduation_kegiatan_prodi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nama_prodi');
            $table->string('image');
            $table->string('subtitle');
            $table->unsignedBigInteger('tahun');
            $table->timestamps();

            $table->foreign('nama_prodi')->on('graduation_profil_prodi')->references('id')->onDelete('cascade');
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
        Schema::table('graduation_kegiatan_prodi', function (Blueprint $table) {
            $table->dropForeign(['nama_prodi']);
        });
        Schema::table('graduation_kegiatan_prodi', function (Blueprint $table) {
            $table->dropForeign(['tahun']);
        });
        Schema::dropIfExists('graduation_kegiatan_prodi');
    }
}
