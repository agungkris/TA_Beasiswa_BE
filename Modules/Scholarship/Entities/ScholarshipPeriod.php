<?php

namespace Modules\Scholarship\Entities;

use Illuminate\Database\Eloquent\Model;

class ScholarshipPeriod extends Model
{
    protected $fillable = ['name', 'due_date_file', 'start_date', 'end_date'];

    protected $table = 'scholarship_periods';
}
