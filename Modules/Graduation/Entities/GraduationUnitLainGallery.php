<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\GraduationTahun;

class GraduationUnitLainGallery extends Model
{
    protected $fillable = ['image','subtitle','unit_lain_id','tahun_id'];

    protected $table = 'graduation_unit_lain_gallery';

    public function unit_lain()
    {
        return $this->belongsTo(GraduationUnitLain::class, 'unit_lain_id');
    }

    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun_id');
    }
}
