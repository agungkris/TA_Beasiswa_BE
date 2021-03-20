<?php

namespace Modules\Scholarship\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Scholarship\Entities\ScholarshipPeriod;

class PeriodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        ScholarshipPeriod::updateOrCreate([
            'id' => 1,
        ], [
            'id' => 1,
            'name' => 'Semester Ganjil 2020',
            'due_date_file' => '2020-10-30',
            'start_date' => '2020-10-05',
            'end_date' => '2020-11-27',
            'created_at' => '2021-01-31 05:55:51',
            'updated_at' => '2021-01-31 05:55:51',
            'deleted_at' => NULL
        ]);



        Scholarshipperiod::updateOrCreate([
            'id' => 2,
        ], [
            'id' => 2,
            'name' => 'Semester Genap 2021',
            'due_date_file' => '2021-03-10',
            'start_date' => '2021-01-25',
            'end_date' => '2021-03-26',
            'created_at' => '2021-01-31 05:56:44',
            'updated_at' => '2021-03-06 05:15:03',
            'deleted_at' => NULL
        ]);



        Scholarshipperiod::updateOrCreate([
            'id' => 16,
        ], [
            'id' => 16,
            'name' => 'Semester Ganjil 2021',
            'due_date_file' => '2021-03-11',
            'start_date' => '2021-03-04',
            'end_date' => '2021-03-19',
            'created_at' => '2021-03-06 08:15:56',
            'updated_at' => '2021-03-06 08:15:56',
            'deleted_at' => NULL
        ]);
    }
}
