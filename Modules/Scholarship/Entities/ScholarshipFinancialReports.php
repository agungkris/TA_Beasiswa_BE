<?php

namespace Modules\Scholarship\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\User;

class ScholarshipFinancialReports extends Model
{
    protected $fillable = ['achievement_id', 'semester_id', 'student_id', 'spp', 'sks', 'result', 'amount'];

    protected $table = 'scholarship_financial_reports';

    public function semester()
    {
        return $this->belongsTo(ScholarshipSemesters::class, 'semester_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function achievement()
    {
        return $this->belongsTo(ScholarshipAchievements::class, 'achievement_id');
    }
}
