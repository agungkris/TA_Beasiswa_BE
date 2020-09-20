<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraduationUnitLainGallery extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graduation_unit_lain_gallery', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('subtitle');
            $table->unsignedBigInteger('unit_lain_id');
            $table->unsignedBigInteger('tahun_id');
            $table->timestamps();

            $table->foreign('unit_lain_id')->on('graduation_unit_lain')->references('id')->onDelete('cascade');
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
        Schema::table('graduation_unit_lain_gallery', function (Blueprint $table) {
            $table->dropForeign(['unit_lain_id']);
        });
        Schema::table('graduation_unit_lain_gallery', function (Blueprint $table) {
            $table->dropForeign(['tahun_id']);
        });
        Schema::dropIfExists('graduation_unit_lain_gallery');
    }
}
