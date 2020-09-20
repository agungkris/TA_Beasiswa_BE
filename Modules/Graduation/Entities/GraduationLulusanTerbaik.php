<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\Prodi;
use Modules\Auth\Entities\GraduationTahun;

class GraduationLulusanTerbaik extends Model
{
    protected $fillable = ['title','lulusan_prodi_id', 'prodi_id','kategori','isi_kategori','prestasi','testimoni','tahun_id'];

    protected $table = 'graduation_lulusan_terbaik';

    public function lulusan()
    {
        return $this->belongsTo(GraduationLulusanProdi::class, 'lulusan_prodi_id');
    }
    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }
    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun_id');
    }
}
