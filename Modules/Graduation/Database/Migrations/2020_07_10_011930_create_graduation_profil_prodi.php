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
            $table->string('nama_prodi');
            $table->string('singkatan_prodi');
            $table->unsignedBigInteger('fakultas');
            $table->string('logo');
            $table->longText('isi_profil');
            $table->string('nama_kaprodi');
            $table->string('image_kaprodi');
            $table->unsignedBigInteger('tahun');
            $table->timestamps();

            $table->foreign('fakultas')->on('graduation_fakultas')->references('id')->onDelete('cascade');
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
        Schema::table('graduation_profil_prodi', function (Blueprint $table) {
            $table->dropForeign(['fakultas']);
        });
        Schema::table('graduation_profil_prodi', function (Blueprint $table) {
            $table->dropForeign(['tahun']);
        });
        Schema::dropIfExists('graduation_profil_prodi');
    }
}
