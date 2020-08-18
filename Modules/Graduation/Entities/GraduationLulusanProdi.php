<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;

class GraduationLulusanProdi extends Model
{
    protected $fillable = ['nama_lengkap','nim','prodi','tempat_lahir','tanggal_lahir','alamat','judul_skripsi','ipk','keterangan','image','tahun'];

    protected $table = 'graduation_lulusan_prodi';

    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun');
    }

    public function prodi()
    {
        return $this->belongsTo(GraduationProfilProdi::class, 'prodi');
    }
}
