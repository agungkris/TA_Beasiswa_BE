<?php

namespace Modules\CommandCenter\Entities;

use Illuminate\Database\Eloquent\Model;

class CollaborationPeriods extends Model
{
    protected $fillable = ['collaboration_periods_name'];

    protected $table = 'collaboration_periods';
}
