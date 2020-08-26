<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;

class GraduationLulusanProdi extends Model
{
    protected $fillable = ['nim','nama_lengkap', 'prodi_id','tempat_lahir','tanggal_lahir','alamat','judul_skripsi','ipk','keterangan','jsdp','image','tahun_id'];

    protected $table = 'graduation_lulusan_prodi';

    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun_id');
    }

    public function prodi()
    {
        return $this->belongsTo(GraduationProfilProdi::class, 'prodi_id');
    }
}
