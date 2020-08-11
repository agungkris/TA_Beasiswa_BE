<?php

namespace Modules\Scholarship\Entities;

use Illuminate\Database\Eloquent\Model;

class ScholarshipInformation extends Model
{
    protected $fillable = ['scholarship_form', 'scholarship_terms_condition', 'cv_templete'];

    protected $table = 'scholarship_information';
}
