<?php

namespace Modules\CommandCenter\Entities;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = ['periods_id','scope_category_id','output','description','organization_file'];

    protected $table = 'organization';

    public function periods()
    {
        return $this->belongsTo(Periods::class, 'periods_id');
    }

    public function scope_category()
    {
        return $this->belongsTo(ScopeCategory::class, 'scope_category_id');
    }
}
