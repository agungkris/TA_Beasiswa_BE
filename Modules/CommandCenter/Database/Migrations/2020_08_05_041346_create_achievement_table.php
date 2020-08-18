<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchievementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achievement', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('achievement_category_id');
            $table->unsignedBigInteger('periods_id');
            $table->unsignedBigInteger('scope_category_id');
            $table->string('achievement_name');
            $table->string('description')->nullable();
            $table->string('achievement_file');
            $table->foreign('achievement_category_id')->on('achievement_category')->references('id')->onDelete('cascade');
            $table->foreign('periods_id')->on('periods')->references('id')->onDelete('cascade');
            $table->foreign('scope_category_id')->on('scope_category')->references('id')->onDelete('cascade');
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
        Schema::table('achievement', function (Blueprint $table) {
            $table->dropForeign(['achievement_category_id']);
            $table->dropForeign(['periods_id']);
            $table->dropForeign(['scope_category_id']);
        });
        Schema::dropIfExists('achievement');
    }
}
