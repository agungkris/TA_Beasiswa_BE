<?php

namespace Modules\Scholarship\Entities;

use Illuminate\Database\Eloquent\Model;

class AnotherScholarshipReports extends Model
{
    protected $fillable = ['student_id','semester_id','academic_achievement_id','competition_achievement_id','organization_achievement_id','event_achievement_id','paper_achievement_id','financial_report_id'];

    protected $table = "another_scholarship_reports";

    public function semester()
    {
        return $this->belongsTo(ScholarshipSemesters::class, 'semester_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function academic()
    {
        return $this->belongsTo(ScholarshipAcademicAchievements::class, 'academic_achievement_id');
    }

    public function competition()
    {
        return $this->belongsTo(ScholarshipCompetitionAchievements::class, 'competition_achievement_id');
    }

    public function organization()
    {
        return $this->belongsTo(ScholarshipOrganizationAchievements::class, 'organization_achievement_id');
    }

    public function event()
    {
        return $this->belongsTo(ScholarshipEventAchievements::class, 'event_achievement_id');
    }

    public function paper()
    {
        return $this->belongsTo(ScholarshipPaperAchievements::class, 'paper_achievement_id');
    }

    public function financial()
    {
        return $this->belongsTo(ScholarshipFinancialReports::class, 'financial_report_id');
    }
}
