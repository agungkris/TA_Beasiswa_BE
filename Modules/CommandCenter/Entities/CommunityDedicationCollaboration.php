<?php

namespace Modules\CommandCenter\Entities;

use Illuminate\Database\Eloquent\Model;

class CommunityDedicationCollaboration extends Model
{
    protected $fillable = ['collaboration_scope_id','collaboration_periods_id','evaluation_periods_id','mou_file','moa_file','supporting_file'];

    protected $table = 'community_collaboration';

    public function collaboration_scope()
    {
        return $this->belongsTo(CollaborationScope::class, 'collaboration_scope_id');
    }

    public function collaboration_periods()
    {
        return $this->belongsTo(CollaborationPeriods::class, 'collaboration_periods_id');
    }

    public function evaluation_periods()
    {
        return $this->belongsTo(EvaluationPeriods::class, 'evaluation_periods_id');
    }
}
