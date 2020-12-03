<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnotherScholarshipReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('another_scholarship_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('semester_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('academic_achievement_id');
            $table->unsignedBigInteger('competition_achievement_id');
            $table->unsignedBigInteger('organization_achievement_id');
            $table->unsignedBigInteger('event_achievement_id');
            $table->unsignedBigInteger('paper_achievement_id');
            $table->unsignedBigInteger('financial_report_id');
            $table->timestamps();

            $table->foreign('semester_id')->on('scholarship_semesters')->references('id')->onDelete('cascade');
            $table->foreign('student_id')->on('users')->references('id')->onDelete('cascade');
            $table->foreign('academic_achievement_id')->on('scholarship_academic_achievements')->references('id')->onDelete('cascade');
            $table->foreign('competition_achievement_id')->on('scholarship_competition_achievements')->references('id')->onDelete('cascade');
            $table->foreign('organization_achievement_id')->on('scholarship_organization_achievements')->references('id')->onDelete('cascade');
            $table->foreign('event_achievement_id')->on('scholarship_event_achievements')->references('id')->onDelete('cascade');
            $table->foreign('paper_achievement_id')->on('scholarship_paper_achievements')->references('id')->onDelete('cascade');
            $table->foreign('financial_report_id')->on('scholarship_financial_reports')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('another_scholarship_reports', function (Blueprint $table) {
            $table->dropForeign(['semester_id']);
            $table->dropForeign(['student_id']);
            $table->dropForeign(['academic_achievement_id']);
            $table->dropForeign(['competition_achievement_id']);
            $table->dropForeign(['organization_achievement_id']);
            $table->dropForeign(['event_achievement_id']);
            $table->dropForeign(['paper_achievement_id']);
            $table->dropForeign(['financial_report_id']);
        });
        Schema::dropIfExists('another_scholarship_reports');
    }
}
