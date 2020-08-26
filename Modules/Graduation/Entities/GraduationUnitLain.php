<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;

class GraduationUnitLain extends Model
{
    protected $fillable = ['nama_kepala_unit','image','subbab','deskripsi','kategori','tahun_id'];

    protected $table = 'graduation_unit_lain';

    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun_id');
    }
}
