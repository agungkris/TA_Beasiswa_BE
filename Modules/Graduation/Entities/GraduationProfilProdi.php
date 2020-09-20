<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\Prodi;
use Modules\Auth\Entities\GraduationTahun;

class GraduationProfilProdi extends Model
{
    protected $fillable = ['prodi_id', "kategori_thesis", 'isi_profil', 'nama_kaprodi', 'image_kaprodi', 'tahun_id'];

    protected $table = 'graduation_profil_prodi';

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }

    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun_id');
    }
}
