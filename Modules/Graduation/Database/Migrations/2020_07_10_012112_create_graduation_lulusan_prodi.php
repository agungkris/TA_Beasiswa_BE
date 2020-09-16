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
            $table->string('nim');
            $table->string('nama_lengkap');
            $table->unsignedBigInteger('prodi_id');
            $table->string('thesis');
            $table->string('email');
            $table->enum('keterangan',['Cum Laude','Tidak Cum Laude']);
            $table->string('image');
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
        Schema::table('graduation_lulusan_prodi', function (Blueprint $table) {
            $table->dropForeign(['prodi_id']);
        });
        Schema::table('graduation_lulusan_prodi', function (Blueprint $table) {
            $table->dropForeign(['tahun_id']);
        });

        Schema::dropIfExists('graduation_lulusan_prodi');
    }
}
