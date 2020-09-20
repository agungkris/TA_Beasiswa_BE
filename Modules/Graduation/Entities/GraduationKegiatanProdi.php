<?php

namespace Modules\Graduation\Entities;
use Modules\Auth\Entities\Prodi;
use Modules\Auth\Entities\GraduationTahun;

use Illuminate\Database\Eloquent\Model;

class GraduationKegiatanProdi extends Model
{
    protected $fillable = ['prodi_id', 'image', 'subtitle', 'tahun_id'];

    protected $table = 'graduation_kegiatan_prodi';

    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun_id');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }
}
