<?php

namespace Modules\Scholarship\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Scholarship\Entities\ScholarshipStudentGroup;

class StudentGroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();



        ScholarshipStudentGroup::updateOrCreate([
            'id' => 1,
        ], [
            'id' => 1,
            'period_id' => 2,
            'group_name' => 'Kelompok 1',
            'topic' => 'Dampak pandemi terhadap perekonomian Indonesia',
            'created_at' => '2021-01-31 05:57:32',
            'updated_at' => '2021-01-31 05:57:32',
            'deleted_at' => NULL
        ]);



        ScholarshipStudentGroup::updateOrCreate([
            'id' => 2,
        ], [
            'id' => 2,
            'period_id' => 2,
            'group_name' => 'Kelompok 2',
            'topic' => 'Peristiwa investasi saham menggunakan \"Uang Panas\"',
            'created_at' => '2021-01-31 05:58:19',
            'updated_at' => '2021-01-31 05:58:19',
            'deleted_at' => NULL
        ]);



        ScholarshipStudentGroup::updateOrCreate([
            'id' => 3,
        ], [
            'id' => 3,
            'period_id' => 2,
            'group_name' => 'Kelompok 3',
            'topic' => 'Efektivitas belajar daring pada masa pandemi covid-19',
            'created_at' => '2021-01-31 05:58:58',
            'updated_at' => '2021-01-31 05:59:12',
            'deleted_at' => NULL
        ]);
    }
}
