<?php

namespace Modules\CommandCenter\Entities;

use Illuminate\Database\Eloquent\Model;

class CommunityDedicationPublication extends Model
{
    protected $fillable = ['publication_category_id','periods_id','scope_category_id','publication_file','description'];

    protected $table = 'community_dedication_publication';

    public function publication_category()
    {
        return $this->belongsTo(PublicationCategory::class, 'publication_category_id');
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
