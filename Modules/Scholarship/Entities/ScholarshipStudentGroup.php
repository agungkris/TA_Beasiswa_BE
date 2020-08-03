<?php

namespace Modules\Scholarship\Entities;

use Illuminate\Database\Eloquent\Model;

class ScholarshipStudentGroup extends Model
{
    protected $fillable = ['period_id', 'group_name', 'topic'];

    protected $table = 'scholarship_student_groups';

    public function period()
    {
        return $this->belongsTo(ScholarshipPeriod::class, 'period_id');
    }
}
