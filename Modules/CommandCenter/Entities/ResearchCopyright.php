<?php

namespace Modules\CommandCenter\Entities;

use Illuminate\Database\Eloquent\Model;

class ResearchCopyright extends Model
{
    protected $fillable = ['copyright_category_id','periods_id','scope_category_id','copyright_file','description'];

    protected $table = 'research_copyright';

    public function achievement_category()
    {
        return $this->belongsTo(CopyrightCategory::class, 'copyright_category_id');
    }

    public function scope_category()
    {
        return $this->belongsTo(ScopeCategory::class, 'scope_category_id');
    }

    public function periods()
    {
        return $this->belongsTo(Periods::class, 'periods_id');
    }
}
