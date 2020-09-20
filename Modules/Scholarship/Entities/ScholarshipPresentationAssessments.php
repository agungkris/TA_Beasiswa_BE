<?php

namespace Modules\Scholarship\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\User;

class ScholarshipPresentationAssessments extends Model
{
    protected $fillable = ['period_id', 'jury_id', 'student_id', 'score_A', 'score_B', 'score_C', 'score_D', 'score_E', 'score_F', 'score_G', 'score_H', 'score_I', 'score_J', 'final_score'];

    protected $table = 'scholarship_presentation_assessments';

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
