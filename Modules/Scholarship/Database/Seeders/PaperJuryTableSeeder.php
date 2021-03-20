<?php

namespace Modules\Scholarship\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Scholarship\Entities\ScholarshipPaperJury;

class PaperJuryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();



        ScholarshipPaperJury::updateOrCreate([
            'id' => 1,
        ], [
            'id' => 1,
            'jury_id' => 3,
            'submissions_id' => 1,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);



        ScholarshipPaperJury::updateOrCreate([
            'id' => 6,
        ], [
            'id' => 6,
            'jury_id' => 3,
            'submissions_id' => 2,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);



        ScholarshipPaperJury::updateOrCreate([
            'id' => 7,
        ], [
            'id' => 7,
            'jury_id' => 3,
            'submissions_id' => 3,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);



        ScholarshipPaperJury::updateOrCreate([
            'id' => 8,
        ], [
            'id' => 8,
            'jury_id' => 4,
            'submissions_id' => 4,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);



        ScholarshipPaperJury::updateOrCreate([
            'id' => 9,
        ], [
            'id' => 9,
            'jury_id' => 4,
            'submissions_id' => 5,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);



        ScholarshipPaperJury::updateOrCreate([
            'id' => 10,
        ], [
            'id' => 10,
            'jury_id' => 4,
            'submissions_id' => 6,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);
    }
}
