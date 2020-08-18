<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGraduationUndangan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('graduation_undangan', function (Blueprint $table) {
            $table->id();
            $table->string('undangan');
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
        Schema::table('graduation_undangan', function (Blueprint $table) {
            $table->dropForeign(['tahun']);
        });
        Schema::dropIfExists('graduation_undangan');
    }
}
