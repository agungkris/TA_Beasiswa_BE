<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatanProdi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan_prodi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nama_prodi');
            $table->string('image');
            $table->string('subtitle');
            $table->timestamps();

            $table->foreign('nama_prodi')->on('profil_prodi')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kegiatan_prodi', function (Blueprint $table) {
            $table->dropForeign(['nama_prodi']);
        });
        Schema::dropIfExists('kegiatan_prodi');
    }
}
