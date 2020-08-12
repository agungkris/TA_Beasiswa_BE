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
            $table->string('singkatan');
            $table->unsignedBigInteger('fakultas');
            $table->longText('isi_profil');
            $table->string('nama_kaprodi');
            $table->string('image');
            $table->timestamps();

            $table->foreign('fakultas')->on('fakultas')->references('id')->onDelete('cascade');
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
            $table->dropForeign(['fakultas']);
        });
        Schema::dropIfExists('profil_prodi');
    }
}
