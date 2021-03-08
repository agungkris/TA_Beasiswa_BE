<?php

namespace Modules\Scholarship\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\User;

class ScholarshipAchievements extends Model
{
    protected $fillable = ['student_id'];

    protected $table = 'scholarship_achievements';

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
