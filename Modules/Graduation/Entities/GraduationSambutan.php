<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\GraduationTahun;


class GraduationSambutan extends Model
{
    protected $fillable = ['nama_lengkap','kategori','text_sambutan','tanggal','image','tahun_id'];

    protected $table = 'graduation_sambutan';

    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun_id');
    }
}
