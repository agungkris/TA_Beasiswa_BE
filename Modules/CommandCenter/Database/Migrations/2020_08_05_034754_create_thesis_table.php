<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThesisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thesis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('generation_id');
            $table->unsignedBigInteger('specialization_id');
            $table->unsignedBigInteger('specialization_topic_id');
            $table->string('output');
            $table->string('student_name');
            $table->foreign('generation_id')->on('generation')->references('id')->onDelete('cascade');
            $table->foreign('specialization_id')->on('specialization')->references('id')->onDelete('cascade');
            $table->foreign('specialization_topic_id')->on('specialization_topic')->references('id')->onDelete('cascade');
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
        Schema::table('thesis', function (Blueprint $table) {
            $table->dropForeign(['generation_id']);
            $table->dropForeign(['specialization_id']);
            $table->dropForeign(['specialization_topic_id']);
        });
        Schema::dropIfExists('thesis');
    }
}
