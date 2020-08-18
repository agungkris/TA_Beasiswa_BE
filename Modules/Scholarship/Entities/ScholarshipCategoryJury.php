<?php

namespace Modules\Scholarship\Entities;

use Illuminate\Database\Eloquent\Model;

class ScholarshipCategoryJury extends Model
{
    protected $fillable = ['jury_id', 'karya_tulis', 'fgd'];

    protected $table = 'scholarship_category_jury';
}
