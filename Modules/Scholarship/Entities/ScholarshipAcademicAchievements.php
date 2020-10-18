<?php

namespace Modules\Scholarship\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\User;

class ScholarshipAcademicAchievements extends Model
{
    protected $fillable = ['student_id','semester_id','ip','sks','ipk','description','khs'];

    protected $table = 'scholarship_academic_achievements';

    public function semester()
    {
        return $this->belongsTo(ScholarshipSemesters::class, 'semester_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
