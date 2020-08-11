<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLulusanProdi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lulusan_prodi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->integer('nim');
            $table->unsignedBigInteger('prodi');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->text('alamat');
            $table->string('judul_skripsi');
            $table->string('ipk');
            $table->enum('keterangan',['Dengan Pujian (Cum Laude)','Sangat Memuaskan','Memuaskan','Kurang Memuaskan']);
            $table->timestamps();

            $table->foreign('prodi')->on('profil_prodi')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lulusan_prodi', function (Blueprint $table) {
            $table->dropForeign(['prodi']);
        });

        Schema::dropIfExists('lulusan_prodi');
    }
}
