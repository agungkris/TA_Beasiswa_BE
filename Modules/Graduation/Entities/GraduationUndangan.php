<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;

class GraduationUndangan extends Model
{
    protected $fillable = ['undangan','tahun'];

    protected $table = 'graduation_undangan';

    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun');
    }

}