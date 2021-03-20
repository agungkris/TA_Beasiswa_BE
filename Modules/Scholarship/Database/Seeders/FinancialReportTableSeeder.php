<?php

namespace Modules\Scholarship\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Scholarship\Entities\ScholarshipFinancialReports;

class FinancialReportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();



        ScholarshipFinancialReports::updateOrCreate([
            'id' => 1,
        ], [
            'id' => 1,
            'semester_id' => 1,
            'student_id' => 13,
            'spp' => 3500000,
            'sks' => 270000,
            'result' => 20,
            'amount' => 8900000,
            'created_at' => '2021-03-08 10:18:19',
            'updated_at' => '2021-03-08 10:18:19'
        ]);



        ScholarshipFinancialReports::updateOrCreate([
            'id' => 2,
        ], [
            'id' => 2,
            'semester_id' => 2,
            'student_id' => 13,
            'spp' => 3500000,
            'sks' => 270000,
            'result' => 22,
            'amount' => 9440000,
            'created_at' => '2021-03-08 10:19:13',
            'updated_at' => '2021-03-08 10:19:13'
        ]);



        ScholarshipFinancialReports::updateOrCreate([
            'id' => 3,
        ], [
            'id' => 3,
            'semester_id' => 3,
            'student_id' => 13,
            'spp' => 3500000,
            'sks' => 270000,
            'result' => 24,
            'amount' => 9980000,
            'created_at' => '2021-03-08 10:19:53',
            'updated_at' => '2021-03-08 10:19:53'
        ]);
    }
}
