<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurriculumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculum', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('periods_id');
            // $table->unsignedBigInteger('specialization_id');
            $table->string('curriculum_file');
            $table->string('description')->nullable();
            $table->foreign('periods_id')->on('periods')->references('id')->onDelete('cascade');
            // $table->foreign('specialization_id')->on('specialization')->references('id')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('curriculum', function (Blueprint $table) {
            $table->dropForeign(['periods_id']);
            // $table->dropForeign(['specialization_id']);
        });
        Schema::dropIfExists('curriculum');
    }
}
