<?php

namespace Modules\Auth\Entities;

use Illuminate\Database\Eloquent\Model;

class ProfilProdi extends Model
{
    protected $fillable = ['nama_prodi', 'singkatan_prodi', 'fakultas_id', 'logo', 'isi_profil', 'nama_kaprodi', 'image_kaprodi', 'tahun_id'];

    protected $table = 'profil_prodi';

    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun_id');
    }

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }
}
