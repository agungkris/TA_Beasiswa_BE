<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('periods_id');
            $table->unsignedBigInteger('scope_category_id');
            $table->string('output');
            $table->string('description')->nullable();
            $table->string('organization_file');
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
        Schema::table('organization', function (Blueprint $table) {
            $table->dropForeign(['periods_id']);
            $table->dropForeign(['scope_category_id']);
        });
        Schema::dropIfExists('organization');
    }
}
