<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\Prodi;
use Modules\Auth\Entities\GraduationTahun;


class GraduationLulusanProdi extends Model
{
    protected $fillable = ['nim','nama_lengkap', 'prodi_id', 'thesis','email','keterangan','image','tahun_id'];

    protected $table = 'graduation_lulusan_prodi';

    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun_id');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }

}
