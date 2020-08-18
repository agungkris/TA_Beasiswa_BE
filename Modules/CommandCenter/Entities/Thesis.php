<?php

namespace Modules\CommandCenter\Entities;

use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    protected $fillable = ['generation_id','specialization_id','specialization_topic_id','output','student_name'];

    protected $table = 'thesis';

    public function generation()
    {
        return $this->belongsTo(Generation::class, 'generation_id');
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class, 'specialization_id');
    }

    public function specialization_topic()
    {
        return $this->belongsTo(SpecializationTopic::class, 'specialization_topic_id');
    }
}
