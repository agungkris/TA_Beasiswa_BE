<?php

namespace Modules\Scholarship\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Scholarship\Entities\ScholarshipAcademicAchievements;

class AcademicAchievementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();



        ScholarshipAcademicAchievements::updateOrCreate([
            'id' => 1,
        ], [
            'id' => 1,
            'semester_id' => 1,
            'student_id' => 13,
            'ip' => 3.5,
            'sks' => 20,
            'ipk' => 3.5,
            'description' => 'Semester 1 mendapatkan IPK 3.5 dengan SKS yang diambil sebanyak 20',
            'khs' => 'document/Dokumen KHS.pdf',
            'created_at' => '2021-03-08 10:10:02',
            'updated_at' => '2021-03-08 10:10:02'
        ]);



        ScholarshipAcademicAchievements::updateOrCreate([
            'id' => 2,
        ], [
            'id' => 2,
            'semester_id' => 2,
            'student_id' => 13,
            'ip' => 3.3,
            'sks' => 22,
            'ipk' => 3.4,
            'description' => 'Semester 2 mendapatkan IPK 3.4 dengan SKS yang diambil sebanyak 22. Total SKS yang telah diambil hingga saat ini 42',
            'khs' => 'document/Dokumen KHS.pdf',
            'created_at' => '2021-03-08 10:11:11',
            'updated_at' => '2021-03-08 10:11:11'
        ]);



        ScholarshipAcademicAchievements::updateOrCreate([
            'id' => 3,
        ], [
            'id' => 3,
            'semester_id' => 3,
            'student_id' => 13,
            'ip' => 3.4,
            'sks' => 24,
            'ipk' => 3.4,
            'description' => 'Semester 3 mendapatkan IPK 3.4 dengan SKS yang diambil sebanyak 24. Total SKS yang telah diambil hingga saat ini 66',
            'khs' => 'document/Dokumen KHS.pdf',
            'created_at' => '2021-03-08 10:12:34',
            'updated_at' => '2021-03-08 10:12:34'
        ]);
    }
}
