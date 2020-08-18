<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;

class GraduationTahun extends Model
{
    protected $fillable = ['tahun'];

    protected $table = 'graduation_tahun';
}
