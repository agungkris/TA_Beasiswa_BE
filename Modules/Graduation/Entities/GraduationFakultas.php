<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;

class GraduationFakultas extends Model
{
    protected $fillable = ['nama_fakultas', 'singkatan_fakultas'];

    protected $table = 'graduation_fakultas';
}
