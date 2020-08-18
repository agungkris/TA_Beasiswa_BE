<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;

class GraduationHomeGallery extends Model
{
    protected $fillable = ['sampul_image','tema','sub_tema','tema_image','deskripsi','tahun'];

    protected $table = 'graduation_home_gallery';

    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun');
    }
}
