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
            $table->enum('kategori', ['KOTA', 'JSDP', 'JLP & RPTRA', 'PJC Sport', 'PJC Urban']);
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
        Schema::table('graduation_unit_lain_gallery', function (Blueprint $table) {
            $table->dropForeign(['tahun']);
        });
        Schema::dropIfExists('graduation_unit_lain_gallery');
    }
}
