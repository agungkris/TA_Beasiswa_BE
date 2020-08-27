<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;

class GraduationLulusanTerbaik extends Model
{
    protected $fillable = ['title','lulusan_prodi_id', 'prodi_id','kategori','prestasi','testimoni','tahun_id'];

    protected $table = 'graduation_lulusan_terbaik';

    public function lulusan()
    {
        return $this->belongsTo(GraduationLulusanProdi::class, 'lulusan_prodi_id');
    }
    public function prodi()
    {
        return $this->belongsTo(ProfilProdi::class, 'prodi_id');
    }
    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun_id');
    }
}
