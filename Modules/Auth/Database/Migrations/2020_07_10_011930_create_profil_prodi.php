<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilProdi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil_prodi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_prodi');
            $table->string('singkatan_prodi');
            $table->unsignedBigInteger('fakultas_id');
            $table->string('logo');
            $table->longText('isi_profil');
            $table->string('nama_kaprodi');
            $table->string('image_kaprodi');
            $table->unsignedBigInteger('tahun_id');
            $table->timestamps();

            $table->foreign('fakultas_id')->on('fakultas')->references('id')->onDelete('cascade');
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
        Schema::table('profil_prodi', function (Blueprint $table) {
            $table->dropForeign(['fakultas_id']);
        });
        Schema::table('profil_prodi', function (Blueprint $table) {
            $table->dropForeign(['tahun_id']);
        });
        Schema::dropIfExists('profil_prodi');
    }
}
