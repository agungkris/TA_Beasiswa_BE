<?php

namespace Modules\Scholarship\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\User;

class ScholarshipCompetitionAchievements extends Model
{
    protected $fillable = ['achievement_id', 'semester_id', 'student_id', 'activity', 'level_id', 'realization', 'result', 'document'];

    protected $table = 'scholarship_competition_achievements';

    public function semester()
    {
        return $this->belongsTo(ScholarshipSemesters::class, 'semester_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function level()
    {
        return $this->belongsTo(ScholarshipLevelAchievements::class, 'level_id');
    }

    public function achievement()
    {
        return $this->belongsTo(ScholarshipAchievements::class, 'achievement_id');
    }
}
