<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;

class GraduationSponsorship extends Model
{
    protected $fillable = ['nama_donatur','bentuk_dukungan','tahun'];

    protected $table = 'graduation_sponsorship';

    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun');
    }
}
