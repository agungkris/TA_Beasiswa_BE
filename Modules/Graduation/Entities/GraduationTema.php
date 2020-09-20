<?php

namespace Modules\Graduation\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Auth\Entities\GraduationTahun;

class GraduationTema extends Model
{
    protected $fillable = ['tema','tema_image','deskripsi','tahun_id'];

    protected $table = 'graduation_tema';

    public function tahun()
    {
        return $this->belongsTo(GraduationTahun::class, 'tahun_id');
    }
}
