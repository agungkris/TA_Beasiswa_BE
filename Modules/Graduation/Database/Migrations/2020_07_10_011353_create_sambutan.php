<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSambutan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sambutan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->enum('kategori',['ketua panitia','rektor','presiden','ketua pengurus','ketua pembina','kepala lldikti']);
            $table->longText('text_sambutan');
            $table->string('image');
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
        Schema::dropIfExists('sambutan');
    }
}
