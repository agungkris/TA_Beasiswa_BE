<?php

namespace Modules\Scholarship\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Scholarship\Entities\ScholarshipCategoryJury;

class CategoryJuryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();



        ScholarshipCategoryJury::updateOrCreate([
            'id' => 1,
        ], [
            'id' => 1,
            'jury_id' => 3,
            'karya_tulis' => 1,
            'fgd' => 1,
            'created_at' => '2021-01-31 06:03:42',
            'updated_at' => '2021-01-31 06:03:42'
        ]);



        ScholarshipCategoryJury::updateOrCreate([
            'id' => 2,
        ], [
            'id' => 2,
            'jury_id' => 4,
            'karya_tulis' => 1,
            'fgd' => NULL,
            'created_at' => '2021-01-31 06:04:21',
            'updated_at' => '2021-03-03 06:44:57'
        ]);



        ScholarshipCategoryJury::updateOrCreate([
            'id' => 3,
        ], [
            'id' => 3,
            'jury_id' => 5,
            'karya_tulis' => 0,
            'fgd' => 1,
            'created_at' => '2021-01-31 06:04:47',
            'updated_at' => '2021-01-31 06:04:47'
        ]);
    }
}
