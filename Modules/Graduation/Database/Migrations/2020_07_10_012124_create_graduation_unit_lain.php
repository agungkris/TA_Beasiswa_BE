<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraduationUnitLain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graduation_unit_lain', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kepala_unit')->nullable();
            $table->string('image')->nullable();
            $table->text('deskripsi');
            $table->enum('kategori', ['KOTA', 'JSDP', 'JLP & RPTRA', 'PJC Sport', 'PJC Urban']);
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
        Schema::table('graduation_unit_lain', function (Blueprint $table) {
            $table->dropForeign(['tahun_id']);
        });
        Schema::dropIfExists('graduation_unit_lain');
    }
}
