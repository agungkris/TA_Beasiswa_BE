<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\GraduationTahun;

class GraduationUndangan extends Model
{
    protected $fillable = ['undangan','tahun_id'];

    protected $table = 'graduation_undangan';

    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun_id');
    }

}
