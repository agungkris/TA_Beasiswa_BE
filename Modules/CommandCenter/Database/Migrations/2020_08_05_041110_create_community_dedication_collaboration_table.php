<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunityDedicationCollaborationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community_collaboration', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('collaboration_scope_id');
            $table->unsignedBigInteger('collaboration_periods_id');
            $table->unsignedBigInteger('evaluation_periods_id');
            $table->string('mou_file');
            $table->string('moa_file');
            $table->string('supporting_file');
            $table->foreign('collaboration_scope_id')->on('collaboration_scope')->references('id')->onDelete('cascade');
            $table->foreign('collaboration_periods_id')->on('collaboration_periods')->references('id')->onDelete('cascade');
            $table->foreign('evaluation_periods_id')->on('evaluation_periods')->references('id')->onDelete('cascade');
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
        Schema::table('community_collaboration', function (Blueprint $table) {
            $table->dropForeign(['collaboration_scope_id']);
            $table->dropForeign(['collaboration_periods_id']);
            $table->dropForeign(['evaluation_periods_id']);
        });
        Schema::dropIfExists('community_collaboration');
    }
}
