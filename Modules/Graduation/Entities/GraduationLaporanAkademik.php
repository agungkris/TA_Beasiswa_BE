<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;

class GraduationLaporanAkademik extends Model
{
    protected $fillable = ['subbab','text_laporan','image1','image2','subtitle','tahun'];

    protected $table = ['graduation_laporan_akademik'];

    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun');
    }
}
