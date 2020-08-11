<?php

namespace Modules\Scholarship\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\Users;

class ScholarshipSubmissions extends Model
{
    protected $fillable = ['student_id', 'period_id', 'submit_form', 'brs', 'raport', 'cv', 'papers', 'other_requirements', 'presentation', 'papers_score'];

    protected $table = 'scholarship_submissions';

    public function period()
    {
        return $this->belongsTo(ScholarshipPeriod::class, 'period_id');
    }

    public function student()
    {
        return $this->belongsTo(Users::class, 'student_id');
    }
}
