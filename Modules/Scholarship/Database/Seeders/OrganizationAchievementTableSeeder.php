<?php

namespace Modules\Scholarship\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Scholarship\Entities\ScholarshipOrganizationAchievements;

class OrganizationAchievementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        ScholarshipOrganizationAchievements::updateOrCreate([
            'id' => 1,
        ], [
            'id' => 1,
            'semester_id' => 3,
            'student_id' => 13,
            'name' => 'HIMAFORKA',
            'period' => '2018-2019',
            'position' => 'Anggota',
            'document' => 'document/Dokumen KHS.pdf',
            'created_at' => '2021-03-08 10:14:28',
            'updated_at' => '2021-03-08 10:14:28'
        ]);
    }
}
