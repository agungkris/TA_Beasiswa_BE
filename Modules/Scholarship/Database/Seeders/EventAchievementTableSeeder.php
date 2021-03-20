<?php

namespace Modules\Scholarship\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Scholarship\Entities\ScholarshipEventAchievements;

class EventAchievementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        ScholarshipEventAchievements::updateOrCreate([
            'id' => 1,
        ], [
            'id' => 1,
            'semester_id' => 1,
            'student_id' => 13,
            'activity' => 'Run Fun',
            'realization' => '25 Oktober 2017',
            'document' => 'document/Prestasi.pdf',
            'created_at' => '2021-03-08 10:15:17',
            'updated_at' => '2021-03-08 10:15:17'
        ]);
    }
}
