<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScholarshipEventAchievements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarship_event_achievements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('semester_id');
            $table->unsignedBigInteger('student_id');
            $table->string('activity');
            $table->string('realization');
            $table->string('document');
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
        Schema::dropIfExists('scholarship_event_achievements', function (Blueprint $table){
            $table->dropForeign(['semester_id']);
            $table->dropForeign(['student_id']);
        });
    }
}
