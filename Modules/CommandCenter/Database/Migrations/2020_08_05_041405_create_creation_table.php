<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('creation_category_id');
            $table->unsignedBigInteger('periods_id');
            $table->unsignedBigInteger('scope_category_id');
            $table->string('creation_name');
            $table->string('description')->nullable();
            $table->string('creation_file');
            $table->foreign('creation_category_id')->on('creation_category')->references('id')->onDelete('cascade');
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
        Schema::table('creation', function (Blueprint $table) {
            $table->dropForeign(['creation_category_id']);
            $table->dropForeign(['periods_id']);
            $table->dropForeign(['scope_category_id']);
        });
        Schema::dropIfExists('creation');
    }
}
