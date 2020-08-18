<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;

class GraduationSaranaPrasarana extends Model
{
    protected $fillable = ['image','subtitle'];

    protected $table = 'graduation_sarana_prasarana';
}
