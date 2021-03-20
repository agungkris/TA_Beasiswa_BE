<?php

namespace Modules\Scholarship\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Scholarship\Entities\ScholarshipCompetitionAchievements;

class CompetitionAchievementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        ScholarshipCompetitionAchievements::updateOrCreate([
            'id' => 1,
        ], [
            'id' => 1,
            'semester_id' => 2,
            'student_id' => 13,
            'activity' => 'Lomba Taekwondo',
            'level_id' => 3,
            'realization' => '25 Oktober 2019',
            'result' => 'Juara 1',
            'document' => 'document/BRS.pdf',
            'created_at' => '2021-03-08 10:21:42',
            'updated_at' => '2021-03-08 10:21:42'
        ]);
    }
}
