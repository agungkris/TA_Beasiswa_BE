<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchCopyrightTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research_copyright', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('copyright_category_id');
            $table->unsignedBigInteger('periods_id');
            $table->unsignedBigInteger('scope_category_id');
            $table->string('copyright_file');
            $table->string('description')->nullable();
            $table->foreign('copyright_category_id')->on('copyright_category')->references('id')->onDelete('cascade');
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
        Schema::table('research_copyright', function (Blueprint $table) {
            $table->dropForeign(['copyright_category_id']);
            $table->dropForeign(['periods_id']);
            $table->dropForeign(['scope_category_id']);
        });
        Schema::dropIfExists('research_copyright');
    }
}
