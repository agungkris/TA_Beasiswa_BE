<?php

namespace Modules\CommandCenter\Entities;

use Illuminate\Database\Eloquent\Model;

class AchievementCategory extends Model
{
    protected $fillable = ['achievement_category_name'];

    protected $table = 'achievement_category';
}
