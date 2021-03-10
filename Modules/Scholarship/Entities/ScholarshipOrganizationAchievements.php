<?php

namespace Modules\Scholarship\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\User;

class ScholarshipOrganizationAchievements extends Model
{
    protected $fillable = ['semester_id', 'student_id', 'name', 'period', 'position', 'document'];

    protected $table = 'scholarship_organization_achievements';

    public function semester()
    {
        return $this->belongsTo(ScholarshipSemesters::class, 'semester_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
