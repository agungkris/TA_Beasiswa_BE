<?php

namespace Modules\CommandCenter\Entities;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    protected $fillable = ['generation_id','internship_scheme_id','location','output','student_name'];

    protected $table = 'internship';

    public function generation()
    {
        return $this->belongsTo(Generation::class, 'generation_id');
    }

    public function internship_scheme()
    {
        return $this->belongsTo(InternshipScheme::class, 'internship_scheme_id');
    }
}
