<?php

namespace Modules\Scholarship\Entities;

use Modules\Auth\Entities\User;
use Illuminate\Database\Eloquent\Model;

class ScholarshipStudentGroup extends Model
{
    protected $fillable = ['period_id', 'group_name', 'topic'];

    protected $table = 'scholarship_student_groups';

    public function period()
    {
        return $this->belongsTo(ScholarshipPeriod::class, 'period_id');
    }

    public function member()
    {
        return $this->belongsToMany(User::class, 'scholarship_student_group_members', 'student_group_id', 'student_id')->with('profile.prodi');
    }
}
