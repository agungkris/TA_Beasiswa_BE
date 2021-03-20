<?php

namespace Modules\Scholarship\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Scholarship\Entities\ScholarshipStudentGroupMembers;

class StudentGroupMemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();



        ScholarshipStudentGroupMembers::updateOrCreate([
            'id' => 17,
        ], [
            'id' => 17,
            'student_group_id' => 1,
            'student_id' => 6,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);



        ScholarshipStudentGroupMembers::updateOrCreate([
            'id' => 18,
        ], [
            'id' => 18,
            'student_group_id' => 1,
            'student_id' => 2,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);



        ScholarshipStudentGroupMembers::updateOrCreate([
            'id' => 19,
        ], [
            'id' => 19,
            'student_group_id' => 2,
            'student_id' => 7,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);



        ScholarshipStudentGroupMembers::updateOrCreate([
            'id' => 20,
        ], [
            'id' => 20,
            'student_group_id' => 2,
            'student_id' => 10,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);



        ScholarshipStudentGroupMembers::updateOrCreate([
            'id' => 21,
        ], [
            'id' => 21,
            'student_group_id' => 3,
            'student_id' => 8,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);



        ScholarshipStudentGroupMembers::updateOrCreate([
            'id' => 22,
        ], [
            'id' => 22,
            'student_group_id' => 3,
            'student_id' => 9,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);
    }
}
