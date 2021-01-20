<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipAcademicAchievements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarship_academic_achievements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('semester_id');
            $table->unsignedBigInteger('student_id');
            $table->double('ip');
            $table->tinyInteger('sks');
            $table->double('ipk');
            $table->string('description');
            $table->string('khs');
            $table->timestamps();

            $table->foreign('semester_id')->on('scholarship_semesters')->references('id')->onDelete('cascade');
            $table->foreign('student_id')->on('users')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scholarship_academic_achievements', function (Blueprint $table) {
            $table->dropForeign(['semester_id']);
            $table->dropForeign(['student_id']);
        });

        Schema::dropIfExists('scholarship_academic_achievements');
    }
}
