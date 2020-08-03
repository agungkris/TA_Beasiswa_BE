<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentGroupMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarship_student_group_members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_group_id');
            $table->unsignedBigInteger('student_id');

            $table->foreign('student_group_id')->on('student_groups')->references('id')->onDelete('cascade');
            $table->foreign('student_id')->on('users')->references('id')->onDelete('cascade');

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
        Schema::table('student_group_members', function (Blueprint $table) {
            $table->dropForeign(['student_group_id']);
        });

        Schema::table('student_group_members', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
        });

        Schema::dropIfExists('student_group_members');
    }
}
