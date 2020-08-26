<?php

namespace Modules\Scholarship\Entities;

use Illuminate\Database\Eloquent\Model;

class ScholarshipAnnouncement extends Model
{
    protected $fillable = ['period_id', 'title', 'description', 'document'];

    public function period()
    {
        return $this->belongsTo(ScholarshipPeriod::class, 'period_id');
    }

    protected $table = 'scholarship_announcement';
}
