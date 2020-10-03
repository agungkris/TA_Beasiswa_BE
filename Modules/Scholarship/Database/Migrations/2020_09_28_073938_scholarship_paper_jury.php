<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ScholarshipPaperJury extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarship_paper_jury', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jury_id');
            $table->unsignedBigInteger('submissions_id');

            $table->foreign('jury_id')->on('users')->references('id')->onDelete('cascade');
            $table->foreign('submissions_id')->on('scholarship_submissions')->references('id')->onDelete('cascade');
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
        Schema::table('scholarship_paper_jury', function (Blueprint $table) {
            $table->dropForeign(['jury_id']);
            $table->dropForeign(['submissions_id']);
        });

        Schema::dropIfExists('scholarship_paper_jury');
    }
}
