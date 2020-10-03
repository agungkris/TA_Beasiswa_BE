<?php

namespace Modules\Scholarship\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\User;

class ScholarshipSubmissions extends Model
{
    protected $fillable = ['student_id', 'period_id', 'submit_form', 'brs', 'raport', 'cv', 'papers', 'other_requirements', 'presentation', 'next_stage', 'final_stage'];

    protected $table = 'scholarship_submissions';

    public function period()
    {
        return $this->belongsTo(ScholarshipPeriod::class, 'period_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
