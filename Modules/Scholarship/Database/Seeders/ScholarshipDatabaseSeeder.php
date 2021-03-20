<?php

namespace Modules\Scholarship\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ScholarshipDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(PeriodTableSeeder::class);
        $this->call(AnnouncementTableSeeder::class);
        $this->call(InformationTableSeeder::class);
        $this->call(SubmissionTableSeeder::class);
        $this->call(CategoryJuryTableSeeder::class);
        $this->call(PaperAssessmentTableSeeder::class);
        $this->call(PaperJuryTableSeeder::class);
        $this->call(PresentationAssessmentTableSeeder::class);
        $this->call(StudentGroupTableSeeder::class);
        $this->call(StudentGroupMemberTableSeeder::class);
        $this->call(SemesterTableSeeder::class);
        $this->call(AcademicAchievementTableSeeder::class);
        $this->call(LevelAchievementTableSeeder::class);
        $this->call(CompetitionAchievementTableSeeder::class);
        $this->call(EventAchievementTableSeeder::class);
        $this->call(FinancialReportTableSeeder::class);
        $this->call(OrganizationAchievementTableSeeder::class);
        $this->call(PaperAchievementTableSeeder::class);
    }
}
