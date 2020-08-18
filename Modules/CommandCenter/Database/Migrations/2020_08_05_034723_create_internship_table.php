<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternshipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internship', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('generation_id');
            $table->unsignedBigInteger('internship_scheme_id');
            $table->string('location');
            $table->string('output');
            $table->string('student_name');
            $table->foreign('generation_id')->on('generation')->references('id')->onDelete('cascade');
            $table->foreign('internship_scheme_id')->on('internship_scheme')->references('id')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('internship', function (Blueprint $table) {
            $table->dropForeign(['generation_id']);
            $table->dropForeign(['internship_scheme_id']);
        });

        Schema::dropIfExists('internship');
    }
}
