<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraduationProfilProdi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graduation_profil_prodi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prodi_id');
            $table->enum('kategori_thesis',['Tugas Akhir','Skripsi']);
            $table->longText('isi_profil');
            $table->string('nama_kaprodi');
            $table->string('image_kaprodi');
            $table->unsignedBigInteger('tahun_id');
            $table->timestamps();

            $table->foreign('prodi_id')->on('prodi')->references('id')->onDelete('cascade');
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
        Schema::table('graduation_profil_prodi', function (Blueprint $table) {
            $table->dropForeign(['prodi_id']);
        });
        Schema::table('graduation_profil_prodi', function (Blueprint $table) {
            $table->dropForeign(['tahun_id']);
        });
        Schema::dropIfExists('graduation_profil_prodi');
    }
}
