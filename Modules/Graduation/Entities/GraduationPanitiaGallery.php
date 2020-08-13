<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;

class GraduationPanitiaGallery extends Model
{
    protected $fillable = ['image','subtitle','tahun'];

    protected $table = 'graduation_panitia_gallery';

    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun');
    }
}