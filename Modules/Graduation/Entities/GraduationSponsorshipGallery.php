<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;

class GraduationSponsorshipGallery extends Model
{
    protected $fillable = ['image','subtitle','tahun_id'];

    protected $table = 'graduation_sponsorship_gallery';

    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun_id');
    }
}
