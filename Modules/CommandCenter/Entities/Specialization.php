<?php

namespace Modules\CommandCenter\Entities;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    protected $fillable = ['specialization_name'];

    protected $table = 'specialization';
}
