<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresentationAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // beda
        Schema::create('scholarship_presentation_assessments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('period_id');
            $table->unsignedBigInteger('jury_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('submission_id');
            $table->unsignedTinyInteger('score_A');
            $table->unsignedTinyInteger('score_B');
            $table->unsignedTinyInteger('score_C');
            $table->unsignedTinyInteger('score_D');
            $table->unsignedTinyInteger('score_E');
            $table->unsignedTinyInteger('score_F');
            $table->unsignedTinyInteger('score_G');
            $table->unsignedTinyInteger('score_H');
            $table->unsignedTinyInteger('score_I');
            $table->unsignedTinyInteger('score_J');
            $table->double('final_score')->default(0);

            $table->foreign('jury_id')->on('users')->references('id')->onDelete('cascade');
            $table->foreign('student_id')->on('users')->references('id')->onDelete('cascade');
            $table->foreign('period_id')->on('scholarship_periods')->references('id')->onDelete('cascade');
            $table->foreign('submission_id')->on('scholarship_submissions')->references('id')->onDelete('cascade');
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
        Schema::table('scholarship_presentation_assessments', function (Blueprint $table) {
            $table->dropForeign(['jury_id']);
        });

        Schema::table('scholarship_presentation_assessments', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
        });

        Schema::table('scholarship_presentation_assessments', function (Blueprint $table) {
            $table->dropForeign(['period_id']);
        });

        Schema::dropIfExists('scholarship_presentation_assessments');
    }
}
