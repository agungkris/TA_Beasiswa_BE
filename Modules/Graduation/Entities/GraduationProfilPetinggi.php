<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;

class GraduationProfilPetinggi extends Model
{
    protected $fillable = ['kategori', 'nama_lengkap', 'jabatan', 'image', 'tahun_awal', 'tahun'];

    protected $table = 'graduation_profil_petinggi';

    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun');
    }
}