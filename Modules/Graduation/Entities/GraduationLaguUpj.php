<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;

class GraduationLaguUpj extends Model
{
    protected $fillable = ['title','image'];

    protected $table = 'graduation_lagu_upj';
}
