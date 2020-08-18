<?php

namespace Modules\CommandCenter\Entities;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $fillable = ['periods_id','specialization_id','curriculum_file','description'];

    protected $table = 'curriculum';

    public function periods()
    {
        return $this->belongsTo(Periods::class, 'periods_id');
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'specialization_id');
    }
}
