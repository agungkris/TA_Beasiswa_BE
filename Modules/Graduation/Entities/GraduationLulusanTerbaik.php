<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;

class GraduationLulusanTerbaik extends Model
{
    protected $fillable = ['id_lulusan','prestasi','testimoni','tahun'];

    protected $table = 'graduation_lulusan_terbaik';

    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun');
    }

    public function lulusan()
    {
        return $this->belongsTo(GraduationLulusanProdi::class, 'id_lulusan');
    }
}
