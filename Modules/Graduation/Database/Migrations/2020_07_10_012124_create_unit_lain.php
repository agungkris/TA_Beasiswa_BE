<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitLain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_lain', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kepala_unit')->nullable();
            $table->string('image')->nullable();
            $table->string('subbab')->nullable();
            $table->longText('deskripsi');
            $table->enum('kategori',['kota','jsdp','jlp & rptra','pjc sport','pjc urban']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kota');
    }
}
