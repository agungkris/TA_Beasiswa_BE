<?php

namespace Modules\Scholarship\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Scholarship\Entities\ScholarshipPresentationAssessments;

class PresentationAssessmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();



        ScholarshipPresentationAssessments::updateOrCreate([
            'id' => 1,
        ], [
            'id' => 1,
            'period_id' => 2,
            'jury_id' => 3,
            'student_id' => 2,
            'submission_id' => 1,
            'score_A' => 90,
            'score_B' => 90,
            'score_C' => 90,
            'score_D' => 90,
            'score_E' => 90,
            'score_F' => 90,
            'score_G' => 90,
            'score_H' => 90,
            'score_I' => 90,
            'score_J' => 90,
            'final_score' => 90,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);



        ScholarshipPresentationAssessments::updateOrCreate([
            'id' => 2,
        ], [
            'id' => 2,
            'period_id' => 2,
            'jury_id' => 4,
            'student_id' => 2,
            'submission_id' => 1,
            'score_A' => 80,
            'score_B' => 80,
            'score_C' => 80,
            'score_D' => 80,
            'score_E' => 80,
            'score_F' => 80,
            'score_G' => 80,
            'score_H' => 80,
            'score_I' => 80,
            'score_J' => 80,
            'final_score' => 80,
            'created_at' => NULL,
            'updated_at' => NULL
        ]);



        ScholarshipPresentationAssessments::updateOrCreate([
            'id' => 3,
        ], [
            'id' => 3,
            'period_id' => 2,
            'jury_id' => 3,
            'student_id' => 8,
            'submission_id' => 4,
            'score_A' => 80,
            'score_B' => 80,
            'score_C' => 80,
            'score_D' => 90,
            'score_E' => 90,
            'score_F' => 90,
            'score_G' => 70,
            'score_H' => 60,
            'score_I' => 60,
            'score_J' => 60,
            'final_score' => 76,
            'created_at' => '2021-03-05 03:39:51',
            'updated_at' => '2021-03-05 03:39:51'
        ]);



        ScholarshipPresentationAssessments::updateOrCreate([
            'id' => 4,
        ], [
            'id' => 4,
            'period_id' => 2,
            'jury_id' => 5,
            'student_id' => 8,
            'submission_id' => 4,
            'score_A' => 80,
            'score_B' => 80,
            'score_C' => 80,
            'score_D' => 90,
            'score_E' => 90,
            'score_F' => 90,
            'score_G' => 70,
            'score_H' => 90,
            'score_I' => 90,
            'score_J' => 90,
            'final_score' => 85,
            'created_at' => '2021-03-05 03:41:33',
            'updated_at' => '2021-03-05 03:41:33'
        ]);



        ScholarshipPresentationAssessments::updateOrCreate([
            'id' => 5,
        ], [
            'id' => 5,
            'period_id' => 2,
            'jury_id' => 3,
            'student_id' => 6,
            'submission_id' => 2,
            'score_A' => 80,
            'score_B' => 80,
            'score_C' => 80,
            'score_D' => 90,
            'score_E' => 90,
            'score_F' => 80,
            'score_G' => 90,
            'score_H' => 80,
            'score_I' => 90,
            'score_J' => 90,
            'final_score' => 85,
            'created_at' => '2021-03-08 09:46:18',
            'updated_at' => '2021-03-08 09:46:18'
        ]);



        ScholarshipPresentationAssessments::updateOrCreate([
            'id' => 6,
        ], [
            'id' => 6,
            'period_id' => 2,
            'jury_id' => 3,
            'student_id' => 7,
            'submission_id' => 4,
            'score_A' => 80,
            'score_B' => 80,
            'score_C' => 80,
            'score_D' => 90,
            'score_E' => 90,
            'score_F' => 80,
            'score_G' => 90,
            'score_H' => 80,
            'score_I' => 90,
            'score_J' => 70,
            'final_score' => 83,
            'created_at' => '2021-03-08 09:47:18',
            'updated_at' => '2021-03-08 09:47:18'
        ]);



        ScholarshipPresentationAssessments::updateOrCreate([
            'id' => 7,
        ], [
            'id' => 7,
            'period_id' => 2,
            'jury_id' => 3,
            'student_id' => 10,
            'submission_id' => 3,
            'score_A' => 80,
            'score_B' => 80,
            'score_C' => 80,
            'score_D' => 90,
            'score_E' => 90,
            'score_F' => 80,
            'score_G' => 90,
            'score_H' => 80,
            'score_I' => 80,
            'score_J' => 70,
            'final_score' => 82,
            'created_at' => '2021-03-08 09:47:27',
            'updated_at' => '2021-03-08 09:47:27'
        ]);



        ScholarshipPresentationAssessments::updateOrCreate([
            'id' => 8,
        ], [
            'id' => 8,
            'period_id' => 2,
            'jury_id' => 3,
            'student_id' => 9,
            'submission_id' => 6,
            'score_A' => 74,
            'score_B' => 90,
            'score_C' => 80,
            'score_D' => 90,
            'score_E' => 90,
            'score_F' => 80,
            'score_G' => 90,
            'score_H' => 80,
            'score_I' => 80,
            'score_J' => 70,
            'final_score' => 82.4,
            'created_at' => '2021-03-08 09:47:43',
            'updated_at' => '2021-03-08 09:47:43'
        ]);



        ScholarshipPresentationAssessments::updateOrCreate([
            'id' => 9,
        ], [
            'id' => 9,
            'period_id' => 2,
            'jury_id' => 5,
            'student_id' => 6,
            'submission_id' => 2,
            'score_A' => 74,
            'score_B' => 90,
            'score_C' => 80,
            'score_D' => 90,
            'score_E' => 90,
            'score_F' => 80,
            'score_G' => 90,
            'score_H' => 80,
            'score_I' => 80,
            'score_J' => 80,
            'final_score' => 83.4,
            'created_at' => '2021-03-08 09:48:15',
            'updated_at' => '2021-03-08 09:48:15'
        ]);



        ScholarshipPresentationAssessments::updateOrCreate([
            'id' => 10,
        ], [
            'id' => 10,
            'period_id' => 2,
            'jury_id' => 5,
            'student_id' => 7,
            'submission_id' => 4,
            'score_A' => 85,
            'score_B' => 90,
            'score_C' => 80,
            'score_D' => 90,
            'score_E' => 90,
            'score_F' => 80,
            'score_G' => 90,
            'score_H' => 85,
            'score_I' => 80,
            'score_J' => 90,
            'final_score' => 86,
            'created_at' => '2021-03-08 09:48:34',
            'updated_at' => '2021-03-08 09:48:34'
        ]);



        ScholarshipPresentationAssessments::updateOrCreate([
            'id' => 11,
        ], [
            'id' => 11,
            'period_id' => 2,
            'jury_id' => 5,
            'student_id' => 10,
            'submission_id' => 3,
            'score_A' => 85,
            'score_B' => 95,
            'score_C' => 84,
            'score_D' => 90,
            'score_E' => 90,
            'score_F' => 80,
            'score_G' => 90,
            'score_H' => 85,
            'score_I' => 80,
            'score_J' => 90,
            'final_score' => 86.9,
            'created_at' => '2021-03-08 09:48:51',
            'updated_at' => '2021-03-08 09:48:51'
        ]);



        ScholarshipPresentationAssessments::updateOrCreate([
            'id' => 12,
        ], [
            'id' => 12,
            'period_id' => 2,
            'jury_id' => 5,
            'student_id' => 9,
            'submission_id' => 6,
            'score_A' => 75,
            'score_B' => 95,
            'score_C' => 90,
            'score_D' => 90,
            'score_E' => 80,
            'score_F' => 80,
            'score_G' => 90,
            'score_H' => 85,
            'score_I' => 80,
            'score_J' => 90,
            'final_score' => 85.5,
            'created_at' => '2021-03-08 09:49:06',
            'updated_at' => '2021-03-08 09:49:06'
        ]);
    }
}
