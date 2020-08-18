<?php

namespace Modules\CommandCenter\Entities;

use Illuminate\Database\Eloquent\Model;

class CurriculumSpecialization extends Model
{
    protected $fillable = ['curriculum_id','specialization_id'];

    protected $table = 'curriculum_specializations';

    public function curriculum()
    {
        return $this->belongsTo(Periods::class, 'curriculum_id');
    }
    public function specialization()
    {
        return $this->belongsTo(Periods::class, 'specialization_id');
    }
}
