<?php

namespace Modules\Scholarship\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\User;

class ScholarshipSubmissions extends Model
{
    protected $fillable = ['student_id', 'period_id', 'submit_form', 'brs', 'raport', 'cv', 'papers', 'other_requirements', 'initial_ipk', 'next_stage', 'final_stage'];

    protected $table = 'scholarship_submissions';

    public function period()
    {
        return $this->belongsTo(ScholarshipPeriod::class, 'period_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function paper_assessments()
    {
        return $this->hasOne(ScholarshipPaperAssessments::class, 'submission_id');
    }

    public function presentation_assessments()
    {
        return $this->hasMany(ScholarshipPresentationAssessments::class, 'submission_id');
    }
}
