<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;

class GraduationKegiatanProdi extends Model
{
    protected $fillable = ['nama_prodi', 'image', 'subtitle', 'tahun'];

    protected $table = 'graduation_kegiatan_prodi';

    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun');
    }

    public function prodi()
    {
        return $this->belongsTo(GraduationProfilProdi::class, 'nama_prodi');
    }
}
