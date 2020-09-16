<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodi', function (Blueprint $table) {
            $table->id();
            $table->string('nama_prodi');
            $table->string('singkatan_prodi');
            $table->unsignedBigInteger('fakultas_id');
            $table->string('logo');
            $table->timestamps();

            $table->foreign('fakultas_id')->on('fakultas')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prodi', function (Blueprint $table) {
            $table->dropForeign(['fakultas_id']);
        });
        Schema::dropIfExists('prodi');
    }
}
