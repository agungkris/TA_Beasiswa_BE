<?php

namespace Modules\Scholarship\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\User;

class ScholarshipEventAchievements extends Model
{
    protected $fillable = ['semester_id','student_id','activity','realization','document'];

    protected $table = 'scholarship_event_achievements';

    public function semester()
    {
        return $this->belongsTo(ScholarshipSemesters::class, 'semester_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
