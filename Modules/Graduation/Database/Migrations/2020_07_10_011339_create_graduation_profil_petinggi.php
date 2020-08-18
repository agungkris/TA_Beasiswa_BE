<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraduationProfilPetinggi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graduation_profil_petinggi', function (Blueprint $table) {
            $table->id();
            $table->enum('kategori', ['Pembina Yayasan Pendidikan Jaya', 'Pengawas Yayasan Pendidikan Jaya', 'Pengurus Yayasan Pendidikan Jaya', 'Penasihat dan Rektorat Universitas Pembangunan Jaya', 'Fakultas Humaniora dan Bisnis', 'Fakultas Teknologi dan Desain']);
            $table->string('nama_lengkap');
            $table->string('jabatan');
            $table->string('image');
            $table->string('tahun_awal');
            $table->unsignedBigInteger('tahun');
            $table->timestamps();

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
        Schema::table('graduation_profil_petinggi', function (Blueprint $table) {
            $table->dropForeign(['tahun']);
        });
        Schema::dropIfExists('graduation_profil_petinggi');
    }
}
