<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;

class GraduationProfilProdi extends Model
{
    protected $fillable = ['nama_prodi', 'singkatan_prodi', 'fakultas_id', 'logo', 'isi_profil', 'nama_kaprodi', 'image_kaprodi', 'tahun_id'];

    protected $table = 'graduation_profil_prodi';

    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun_id');
    }

    public function fakultas()
    {
        return $this->belongsTo(GraduationFakultas::class, 'fakultas_id');
    }
}
