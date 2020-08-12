<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('generation_id');
            $table->string('message');
            $table->foreign('generation_id')->on('generation')->references('id')->onDelete('cascade');
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
        Schema::table('forum', function (Blueprint $table) {
            $table->dropForeign(['generation_id']);
        });
        Schema::dropIfExists('forum');
    }
}
