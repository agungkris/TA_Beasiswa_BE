<?php

namespace Modules\Scholarship\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\User;

class ScholarshipPaperAssessments extends Model
{
    protected $fillable = ['period_id', 'jury_id', 'student_id', 'submission_id', 'format_papers', 'creativity', 'contribution', 'information', 'conclusion', 'comment', 'papers_score'];

    protected $table = 'scholarship_paper_assessments';

    public function period()
    {
        return $this->belongsTo(ScholarshipPeriod::class, 'period_id');
    }

    public function jury()
    {
        return $this->belongsTo(User::class, 'jury_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
