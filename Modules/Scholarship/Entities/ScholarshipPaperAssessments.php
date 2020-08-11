<?php

namespace Modules\Scholarship\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\Users;

class ScholarshipPaperAssessments extends Model
{
    protected $fillable = ['period_id', 'jury_id', 'student_id', 'format_papers', 'creativity', 'contribution', 'information', 'conclusion', 'comment', 'score'];

    protected $table = 'scholarship_paper_assessments';

    public function period()
    {
        return $this->belongsTo(ScholarshipPeriod::class, 'period_id');
    }

    public function jury()
    {
        return $this->belongsTo(Users::class, 'jury_id');
    }

    public function student()
    {
        return $this->belongsTo(Users::class, 'student_id');
    }
}
