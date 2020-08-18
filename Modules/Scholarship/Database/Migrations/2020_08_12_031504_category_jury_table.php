<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CategoryJuryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarship_category_jury', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jury_id');
            $table->unsignedBigInteger('karya_tulis');
            $table->unsignedBigInteger('fgd');

            $table->foreign('jury_id')->on('users')->references('id')->onDelete('cascade');
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
        Schema::table('scholarship_category_jury', function (Blueprint $table) {
            $table->dropForeign(['jury_id']);
        });

        Schema::dropIfExists('scholarship_category_jury');
    }
}
