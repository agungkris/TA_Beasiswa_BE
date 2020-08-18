<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;

class GraduationPanitia extends Model
{
    protected $fillable = ['seksi_panitia','jabatan','nama_lengkap','tahun'];

    protected $table = 'graduation_panitia';

    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun');
    }
}
