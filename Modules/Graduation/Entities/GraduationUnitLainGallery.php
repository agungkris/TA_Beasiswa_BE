<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;

class GraduationUnitLainGallery extends Model
{
    protected $fillable = ['image','subtitle','kategori','tahun_id'];

    protected $table = 'graduation_unit_lain_gallery';

    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun_id');
    }
}
