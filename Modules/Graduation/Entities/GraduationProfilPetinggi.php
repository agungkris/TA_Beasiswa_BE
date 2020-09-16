<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\GraduationTahun;

class GraduationProfilPetinggi extends Model
{
    protected $fillable = ['kategori', 'nama_lengkap', 'jabatan', 'image', 'tahun_id'];

    protected $table = 'graduation_profil_petinggi';

    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun_id');
    }
}
