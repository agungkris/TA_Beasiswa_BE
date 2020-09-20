<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\GraduationTahun;

class GraduationSponsorship extends Model
{
    protected $fillable = ['nama_donatur','bentuk_dukungan','tahun_id'];

    protected $table = 'graduation_sponsorship';

    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun_id');
    }
}
