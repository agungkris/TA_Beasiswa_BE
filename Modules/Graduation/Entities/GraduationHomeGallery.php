<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;

class GraduationHomeGallery extends Model
{
    protected $fillable = ['sampul_image','title','sub_title','tema','tema_image','deskripsi','tahun_id'];

    protected $table = 'graduation_home_gallery';

    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun_id');
    }
}
