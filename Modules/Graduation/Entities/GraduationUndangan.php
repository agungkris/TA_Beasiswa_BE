<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\GraduationTahun;

class GraduationUndangan extends Model
{
    protected $fillable = ['undangan','kategori','tahun_id'];

    protected $table = 'graduation_undangan';

    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun_id');
    }

}
