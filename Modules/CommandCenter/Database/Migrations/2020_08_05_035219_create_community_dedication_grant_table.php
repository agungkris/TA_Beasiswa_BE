<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunityDedicationGrantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community_dedication_grant', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('scope_category_id');
            $table->unsignedBigInteger('periods_id');
            $table->string('grant_file');
            $table->string('description')->nullable();
            $table->foreign('scope_category_id')->on('scope_category')->references('id')->onDelete('cascade');
            $table->foreign('periods_id')->on('periods')->references('id')->onDelete('cascade');
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
        Schema::table('community_dedication_grant', function (Blueprint $table) {
            $table->dropForeign(['scope_category_id']);
            $table->dropForeign(['periods_id']);
            
        });
        Schema::dropIfExists('community_dedication_grant');
    }
}
