<?php

namespace Modules\Scholarship\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Scholarship\Entities\ScholarshipSemesters;

class SemesterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();



        ScholarshipSemesters::updateOrCreate([
            'id' => 1,
        ], [
            'id' => 1,
            'semester' => 'Semester 1',
            'created_at' => '2021-01-31 05:39:47',
            'updated_at' => '2021-01-31 05:39:47'
        ]);



        ScholarshipSemesters::updateOrCreate([
            'id' => 2,
        ], [
            'id' => 2,
            'semester' => 'Semester 2',
            'created_at' => '2021-01-31 05:39:50',
            'updated_at' => '2021-01-31 05:39:50'
        ]);



        ScholarshipSemesters::updateOrCreate([
            'id' => 3,
        ], [
            'id' => 3,
            'semester' => 'Semester 3',
            'created_at' => '2021-01-31 05:39:53',
            'updated_at' => '2021-01-31 05:39:53'
        ]);



        ScholarshipSemesters::updateOrCreate([
            'id' => 4,
        ], [
            'id' => 4,
            'semester' => 'Semester 4',
            'created_at' => '2021-01-31 05:39:55',
            'updated_at' => '2021-01-31 05:39:55'
        ]);



        ScholarshipSemesters::updateOrCreate([
            'id' => 5,
        ], [
            'id' => 5,
            'semester' => 'Semester 5',
            'created_at' => '2021-01-31 05:39:57',
            'updated_at' => '2021-01-31 05:39:57'
        ]);



        ScholarshipSemesters::updateOrCreate([
            'id' => 6,
        ], [
            'id' => 6,
            'semester' => 'Semester 6',
            'created_at' => '2021-01-31 05:39:59',
            'updated_at' => '2021-01-31 05:39:59'
        ]);



        ScholarshipSemesters::updateOrCreate([
            'id' => 7,
        ], [
            'id' => 7,
            'semester' => 'Semester 7',
            'created_at' => '2021-01-31 05:40:01',
            'updated_at' => '2021-01-31 05:40:01'
        ]);



        ScholarshipSemesters::updateOrCreate([
            'id' => 8,
        ], [
            'id' => 8,
            'semester' => 'Semester 8',
            'created_at' => '2021-01-31 05:40:04',
            'updated_at' => '2021-01-31 05:40:04'
        ]);
    }
}
