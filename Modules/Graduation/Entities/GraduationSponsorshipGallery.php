<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\GraduationTahun;

class GraduationSponsorshipGallery extends Model
{
    protected $fillable = ['image','subtitle','tahun_id'];

    protected $table = 'graduation_sponsorship_gallery';

    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun_id');
    }
}
