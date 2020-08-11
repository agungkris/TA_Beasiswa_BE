<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;

class GraduationSejarahUpj extends Model
{
    protected $fillable = ['subbab','text_sejarah'];

    protected $table = 'graduation_sejarah_upj';
}
