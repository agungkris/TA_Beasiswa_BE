<?php

namespace Modules\CommandCenter\Entities;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = ['achievement_category_id','periods_id','scope_category_id','achievement_name','description','achievement_file'];

    protected $table = 'achievement';

    public function achievement_category()
    {
        return $this->belongsTo(AchievementCategory::class, 'achievement_category_id');
    }

    public function periods()
    {
        return $this->belongsTo(Periods::class, 'periods_id');
    }

    public function scope_category()
    {
        return $this->belongsTo(ScopeCategory::class, 'scope_category_id');
    }
}
