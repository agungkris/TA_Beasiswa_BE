<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarship_information', function (Blueprint $table) {
            $table->id();
            // didatabase yang beasiswaupjPC ada periode
            $table->string('scholarship_form');
            $table->string('scholarship_terms_condition');
            $table->string('cv_templete');
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
        Schema::dropIfExists('scholarship_information');
    }
}
