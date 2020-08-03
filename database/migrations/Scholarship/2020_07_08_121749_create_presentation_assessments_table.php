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
        Schema::create('scholarship_presentation_assessments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('period_id');
            $table->unsignedBigInteger('jury_id');
            $table->unsignedBigInteger('student_id');
            $table->double('score')->default(0);

            $table->foreign('jury_id')->on('users')->references('id')->onDelete('cascade');
            $table->foreign('student_id')->on('users')->references('id')->onDelete('cascade');
            $table->foreign('period_id')->on('periods')->references('id')->onDelete('cascade');
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
        Schema::table('presentation_assessments', function (Blueprint $table) {
            $table->dropForeign(['jury_id']);
        });

        Schema::table('presentation_assessments', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
        });

        Schema::table('presentation_assessments', function (Blueprint $table) {
            $table->dropForeign(['period_id']);
        });

        Schema::dropIfExists('presentation_assessments');
    }
}
