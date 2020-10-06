<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarship_submissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('period_id');
            $table->string('submit_form');
            $table->string('brs');
            $table->string('raport');
            $table->string('cv');
            $table->string('papers');
            $table->string('other_requirements')->nullable();
            $table->double('presentation')->default(0)->nullable();
            $table->tinyInteger('next_stage')->nullable();
            $table->tinyInteger('final_stage')->nullable();


            $table->foreign('period_id')->on('scholarship_periods')->references('id')->onDelete('cascade');
            $table->foreign('student_id')->on('users')->references('id')->onDelete('cascade');
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
        Schema::table('scholarship_submissions', function (Blueprint $table) {
            $table->dropForeign(['period_id']);
            $table->dropForeign(['student_id']);
        });


        Schema::dropIfExists('scholarship_submissions');
    }
}
