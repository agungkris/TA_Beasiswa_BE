<?php

namespace Modules\CommandCenter\Entities;

use Illuminate\Database\Eloquent\Model;

class Creation extends Model
{
    protected $fillable = ['creation_category_id','periods_id','scope_category_id','creation_name','description','creation_file'];

    protected $table = 'creation';

    public function creation_category()
    {
        return $this->belongsTo(CreationCategory::class, 'creation_category_id');
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
