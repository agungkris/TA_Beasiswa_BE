<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurriculumSpecializationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculum_specializations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('curriculum_id');
            $table->unsignedBigInteger('specialization_id');
            $table->foreign('curriculum_id')->on('curriculum')->references('id')->onDelete('cascade');
            $table->foreign('specialization_id')->on('specialization')->references('id')->onDelete('cascade');



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
        Schema::table('curriculum_specializations', function (Blueprint $table) {
            $table->dropForeign(['curriculum_id']);
            $table->dropForeign(['specialization_id']);
            // $table->dropForeign(['specialization_id']);
        });
        Schema::dropIfExists('curriculum_specializations');
    }
}
