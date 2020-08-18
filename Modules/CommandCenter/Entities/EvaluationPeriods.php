<?php

namespace Modules\CommandCenter\Entities;

use Illuminate\Database\Eloquent\Model;

class EvaluationPeriods extends Model
{
    protected $fillable = ['evaluation_periods_name'];

    protected $table = 'evaluation_periods';
}
