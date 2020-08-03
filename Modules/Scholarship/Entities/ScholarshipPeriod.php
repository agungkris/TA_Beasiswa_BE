<?php

namespace Modules\Scholarship\Entities;

use Illuminate\Database\Eloquent\Model;

class ScholarshipPeriod extends Model
{
    protected $fillable = ['name'];

    protected $table = 'scholarship_periods';
}
