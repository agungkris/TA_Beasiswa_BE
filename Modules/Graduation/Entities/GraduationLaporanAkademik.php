<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\GraduationTahun;

class GraduationLaporanAkademik extends Model
{
    // protected $fillable = ['subbab','text_laporan','image','subtitle','tahun_id'];

    protected $fillable = ['file','tahun_id'];


    protected $table = 'graduation_laporan_akademik';

    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun_id');
    }
}
