<?php

namespace Modules\CommandCenter\Entities;

use Illuminate\Database\Eloquent\Model;

class CommunityDedicationGrant extends Model
{
    protected $fillable = ['scope_category_id','periods_id','grant_file','description'];

    protected $table = 'community_dedication_grant';

    public function scope_category()
    {
        return $this->belongsTo(ScopeCategory::class, 'scope_category_id');
    }

    public function periods()
    {
        return $this->belongsTo(Periods::class, 'periods_id');
    }
}
