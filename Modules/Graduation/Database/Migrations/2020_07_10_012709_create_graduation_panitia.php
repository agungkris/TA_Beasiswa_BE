<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraduationPanitia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graduation_panitia', function (Blueprint $table) {
            $table->id();
            $table->string('seksi_panitia');
            $table->string('jabatan');
            $table->text('list_anggota');
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
        Schema::table('graduation_panitia', function (Blueprint $table) {
            $table->dropForeign(['tahun_id']);
        });
        Schema::dropIfExists('graduation_panitia');
    }
}
