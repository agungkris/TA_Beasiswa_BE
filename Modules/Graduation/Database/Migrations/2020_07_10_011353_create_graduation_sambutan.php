<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraduationSambutan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graduation_sambutan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->enum('kategori', ['Ketua Panitia Wisuda', 'Rektor Universitas Pembangunan Jaya', 'Presiden Universitas Pembangunan Jaya', 'Ketua Pengurus Yayasan Pendidikan Jaya', 'Ketua Pembina Yayasan Pendidikan Jaya', 'Kepala LLDIKTI Wilayah IV']);
            $table->longText('text_sambutan');
            $table->string('image');
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
        Schema::table('graduation_sambutan', function (Blueprint $table) {
            $table->dropForeign(['tahun']);
        });
        Schema::dropIfExists('graduation_sambutan');
    }
}
