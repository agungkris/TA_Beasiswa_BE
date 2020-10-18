<?php

namespace Modules\Scholarship\Entities;

use Illuminate\Database\Eloquent\Model;

class ScholarshipSemesters extends Model
{
    protected $fillable = ['semester'];

    protected $table = 'scholarship_semesters';
}
