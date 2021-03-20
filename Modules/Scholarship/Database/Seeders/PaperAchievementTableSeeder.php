<?php

namespace Modules\Scholarship\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Scholarship\Entities\ScholarshipPaperAchievements;

class PaperAchievementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        ScholarshipPaperAchievements::updateOrCreate([
            'id' => 1,
        ], [
            'id' => 1,
            'semester_id' => 2,
            'student_id' => 13,
            'title' => 'Analisis Efektivitas Aplikasi e-Batik Dalam Upaya Memperkenalkan Batik Indonesia Kepada Dunia',
            'document' => 'document/originality report 2.9.2019 9-49-49 - agungurah krisnanda.pdf',
            'created_at' => '2021-03-08 10:17:26',
            'updated_at' => '2021-03-08 10:17:26'
        ]);
    }
}
