<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;

class GraduationVisiMisi extends Model
{
    protected $fillable = ['title','text'];

    protected $table = 'graduation_visi_misi';

    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun');
    }
}
