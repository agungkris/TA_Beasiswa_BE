<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraduationLulusanProdi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graduation_lulusan_prodi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->integer('nim');
            $table->unsignedBigInteger('prodi');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('judul_skripsi');
            $table->string('ipk');
            $table->enum('keterangan',['Dengan Pujian (Cum Laude)','Sangat Memuaskan','Memuaskan','Kurang Memuaskan']);
            $table->string('image');
            $table->unsignedBigInteger('tahun');
            $table->timestamps();

            $table->foreign('prodi')->on('graduation_profil_prodi')->references('id')->onDelete('cascade');
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
        Schema::table('graduation_lulusan_prodi', function (Blueprint $table) {
            $table->dropForeign(['prodi']);
        });
        Schema::table('graduation_lulusan_prodi', function (Blueprint $table) {
            $table->dropForeign(['tahun']);
        });

        Schema::dropIfExists('graduation_lulusan_prodi');
    }
}
