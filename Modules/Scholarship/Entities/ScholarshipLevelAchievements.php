<?php

namespace Modules\Scholarship\Entities;

use Illuminate\Database\Eloquent\Model;

class ScholarshipLevelAchievements extends Model
{
    protected $fillable = ['level'];

    protected $table = 'scholarship_level_achievements';
}
