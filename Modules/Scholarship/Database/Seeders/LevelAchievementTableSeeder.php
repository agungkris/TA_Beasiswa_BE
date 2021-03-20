<?php

namespace Modules\Scholarship\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Scholarship\Entities\ScholarshipLevelAchievements;

class LevelAchievementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();



        ScholarshipLevelAchievements::updateOrCreate([
            'id' => 1,
        ], [
            'id' => 1,
            'level' => 'Lokal (Tingkat UPJ)',
            'created_at' => '2021-03-04 06:10:36',
            'updated_at' => '2021-03-04 06:10:36'
        ]);



        ScholarshipLevelAchievements::updateOrCreate([
            'id' => 2,
        ], [
            'id' => 2,
            'level' => 'Nasional',
            'created_at' => '2021-03-04 06:10:43',
            'updated_at' => '2021-03-04 06:10:43'
        ]);



        ScholarshipLevelAchievements::updateOrCreate([
            'id' => 3,
        ], [
            'id' => 3,
            'level' => 'Internasional',
            'created_at' => '2021-03-04 06:10:49',
            'updated_at' => '2021-03-04 06:10:49'
        ]);
    }
}
