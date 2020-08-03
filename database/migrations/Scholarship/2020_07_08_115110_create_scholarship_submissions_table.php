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
            $table->string('formulir')->nullable();
            $table->string('brs')->nullable();
            $table->string('transkrip')->nullable();
            $table->string('cv')->nullable();
            $table->string('karyatulis')->nullable();
            $table->string('prestasi')->nullable();
            $table->double('ipk')->default(0);
            $table->double('presentasi')->default(0);
            $table->tinyInteger('is_accepted')->default(0);

            $table->foreign('period_id')->on('periods')->references('id')->onDelete('cascade');
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
        });

        Schema::table('scholarship_submissions', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
        });

        Schema::dropIfExists('scholarship_submissions');
    }
}
