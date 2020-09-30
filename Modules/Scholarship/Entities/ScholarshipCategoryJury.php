<?php

namespace Modules\Scholarship\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\User;

class ScholarshipCategoryJury extends Model
{
    protected $fillable = ['jury_id', 'karya_tulis', 'fgd'];

    protected $table = 'scholarship_category_jury';

    public function jury()
    {
        return $this->belongsTo(User::class, 'jury_id');
    }
}
