<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;

class GraduationJanjiWisudawan extends Model
{
    protected $fillable = ['text_janji','image'];

    protected $table = 'graduation_janji_wisudawan';
}
