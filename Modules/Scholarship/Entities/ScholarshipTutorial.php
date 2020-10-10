<?php

namespace Modules\Scholarship\Entities;

use Illuminate\Database\Eloquent\Model;

class ScholarshipTutorial extends Model
{
    protected $fillable = ['laporan_beasiswa', 'akun_mahasiswa', 'akun_juri', 'grup_fgd', 'pemberitahuan_admin', 'periode', 'seleksi_beasiswa', 'ketentuan_beasiswa_admin', 'juri_fgd', 'juri_karya_tulis', 'pemberitahuan_mahasiswa', 'ketentuan_beasiswa_mahasiswa', 'pengumpulan_dokumen_mahasiswa'];

    protected $table='scholarship_tutorial';
}
