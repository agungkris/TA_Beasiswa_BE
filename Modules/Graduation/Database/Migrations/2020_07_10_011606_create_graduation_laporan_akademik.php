<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraduationLaporanAkademik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graduation_laporan_akademik', function (Blueprint $table) {
            $table->id();
            $table->string('subbab')->nullable();
            $table->longText('text_laporan')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('subtitle')->nullable();
            $table->unsignedBigInteger('tahun_id');
            $table->timestamps();

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
        Schema::table('graduation_laporan_akademik', function (Blueprint $table) {
            $table->dropForeign(['tahun_id']);
        });
        Schema::dropIfExists('graduation_laporan_akademik');
    }
}
