<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLulusanTerbaik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lulusan_terbaik', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_lulusan');
            $table->string('prestasi');
            $table->text('testimoni');
            $table->timestamps();

            $table->foreign('id_lulusan')->on('lulusan_prodi')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lulusan_terbaik', function (Blueprint $table) {
            $table->dropForeign(['id_lulusan']);
        });
        Schema::dropIfExists('lulusan_terbaik');
    }
}
