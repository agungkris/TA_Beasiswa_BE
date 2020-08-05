<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilPetinggi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil_petinggi', function (Blueprint $table) {
            $table->id();
            $table->enum('kategori',['pembina','pengawas','pengurus','penasihat dan rektorat','fhb','ftd']);
            $table->string('nama_lengkap');
            $table->string('jabatan');
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
        Schema::dropIfExists('profil_petinggi');
    }
}
