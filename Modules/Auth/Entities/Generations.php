<?php

namespace Modules\Auth\Entities;

use Illuminate\Database\Eloquent\Model;

class Generations extends Model
{
    protected $fillable = ['name'];

    protected $table = 'generations';
}
