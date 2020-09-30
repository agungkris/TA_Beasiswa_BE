<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaperAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // beda
        Schema::create('scholarship_paper_assessments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('period_id');
            $table->unsignedBigInteger('jury_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedTinyInteger('format_papers');
            $table->unsignedTinyInteger('creativity');
            $table->unsignedTinyInteger('contribution');
            $table->unsignedTinyInteger('information');
            $table->unsignedTinyInteger('conclusion');
            $table->string('comment')->nullable();
            $table->double('papers_score')->default(0);

            $table->foreign('jury_id')->on('users')->references('id')->onDelete('cascade');
            $table->foreign('student_id')->on('users')->references('id')->onDelete('cascade');
            $table->foreign('period_id')->on('scholarship_periods')->references('id')->onDelete('cascade');
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
        Schema::table('scholarship_paper_assessments', function (Blueprint $table) {
            $table->dropForeign(['jury_id']);
        });

        Schema::table('scholarship_paper_assessments', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
        });

        Schema::table('scholarship_paper_assessments', function (Blueprint $table) {
            $table->dropForeign(['period_id']);
        });

        Schema::dropIfExists('scholarship_paper_assessments');
    }
}
