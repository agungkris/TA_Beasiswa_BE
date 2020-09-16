<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\GraduationTahun;

class GraduationPanitia extends Model
{
    protected $fillable = ['seksi_panitia','jabatan','list_anggota','tahun_id'];

    protected $table = 'graduation_panitia';

    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun_id');
    }
}
