<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ListStudent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarship_list_student', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->string('prodi');
            $table->tinyInteger('generation');
            $table->timestamps();

            $table->foreign('users_id')->on('scholarship_list_student')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scholarship_list_student', function (Blueprint $table) {
            $table->dropForeign(['users_id']);
        });
    }
}
