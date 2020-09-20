<?php

namespace Modules\Scholarship\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\User;

class ScholarshipStudentGroupMembers extends Model
{
    protected $fillable = ['student_group_id', 'student_id'];

    protected $table = 'scholarship_student_group_members';

    public function student_group()
    {
        return $this->belongsTo(ScholarshipStudentGroup::class, 'student_group_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
