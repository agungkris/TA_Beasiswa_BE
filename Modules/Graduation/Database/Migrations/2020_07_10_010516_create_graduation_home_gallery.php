<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraduationHomeGallery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graduation_home_gallery', function (Blueprint $table) {
            $table->id();
            $table->string('sampul_image');
            $table->string('tema');
            $table->string('sub_tema');
            $table->string('tema_image');
            $table->string('deskripsi');
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
        Schema::table('graduation_home_gallery', function (Blueprint $table) {
            $table->dropForeign(['tahun']);
        });
        Schema::dropIfExists('graduation_home_gallery');
    }
}