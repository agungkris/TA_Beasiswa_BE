<?php

namespace Modules\Scholarship\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Scholarship\Entities\ScholarshipPaperAssessments;

class PaperAssessmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();



        ScholarshipPaperAssessments::updateOrCreate([
            'id' => 1,
        ], [
            'id' => 1,
            'period_id' => 2,
            'jury_id' => 3,
            'student_id' => 2,
            'submission_id' => 1,
            'format_papers' => 90,
            'creativity' => 90,
            'contribution' => 80,
            'information' => 90,
            'conclusion' => 40,
            'comment' => 'mantap',
            'papers_score' => 80,
            'created_at' => '2021-01-31 06:09:38',
            'updated_at' => '2021-03-05 03:17:12'
        ]);



        ScholarshipPaperAssessments::updateOrCreate([
            'id' => 2,
        ], [
            'id' => 2,
            'period_id' => 2,
            'jury_id' => 3,
            'student_id' => 6,
            'submission_id' => 2,
            'format_papers' => 90,
            'creativity' => 90,
            'contribution' => 80,
            'information' => 90,
            'conclusion' => 40,
            'comment' => 'Cukup baik',
            'papers_score' => 80,
            'created_at' => '2021-03-03 08:32:42',
            'updated_at' => '2021-03-08 09:40:02'
        ]);



        ScholarshipPaperAssessments::updateOrCreate([
            'id' => 3,
        ], [
            'id' => 3,
            'period_id' => 2,
            'jury_id' => 3,
            'student_id' => 10,
            'submission_id' => 3,
            'format_papers' => 80,
            'creativity' => 70,
            'contribution' => 90,
            'information' => 80,
            'conclusion' => 80,
            'comment' => 'Cukup',
            'papers_score' => 79.5,
            'created_at' => '2021-03-08 09:40:22',
            'updated_at' => '2021-03-08 09:40:22'
        ]);



        ScholarshipPaperAssessments::updateOrCreate([
            'id' => 4,
        ], [
            'id' => 4,
            'period_id' => 2,
            'jury_id' => 4,
            'student_id' => 7,
            'submission_id' => 4,
            'format_papers' => 60,
            'creativity' => 50,
            'contribution' => 50,
            'information' => 70,
            'conclusion' => 80,
            'comment' => 'Kurang menarik',
            'papers_score' => 59.5,
            'created_at' => '2021-03-08 09:41:23',
            'updated_at' => '2021-03-08 09:41:23'
        ]);



        ScholarshipPaperAssessments::updateOrCreate([
            'id' => 5,
        ], [
            'id' => 5,
            'period_id' => 2,
            'jury_id' => 4,
            'student_id' => 8,
            'submission_id' => 5,
            'format_papers' => 80,
            'creativity' => 80,
            'contribution' => 90,
            'information' => 90,
            'conclusion' => 70,
            'comment' => 'Kesimpulan harus lebih baik lagi',
            'papers_score' => 83,
            'created_at' => '2021-03-08 09:41:53',
            'updated_at' => '2021-03-08 09:41:53'
        ]);



        ScholarshipPaperAssessments::updateOrCreate([
            'id' => 6,
        ], [
            'id' => 6,
            'period_id' => 2,
            'jury_id' => 4,
            'student_id' => 9,
            'submission_id' => 6,
            'format_papers' => 90,
            'creativity' => 90,
            'contribution' => 80,
            'information' => 90,
            'conclusion' => 85,
            'comment' => 'Baik',
            'papers_score' => 86.75,
            'created_at' => '2021-03-08 09:42:09',
            'updated_at' => '2021-03-08 09:42:09'
        ]);
    }
}
