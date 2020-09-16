<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\GraduationTahun;

class GraduationHomeGallery extends Model
{
    protected $fillable = ['sampul_image','sampul_title','sub_title','keterangan','tahun_id'];

    protected $table = 'graduation_home_gallery';

    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun_id');
    }
}
