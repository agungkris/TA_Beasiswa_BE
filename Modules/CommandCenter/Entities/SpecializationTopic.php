<?php

namespace Modules\CommandCenter\Entities;

use Illuminate\Database\Eloquent\Model;

class SpecializationTopic extends Model
{
    protected $fillable = ['specialization_topic_name'];

    protected $table = 'specialization_topic';
}
