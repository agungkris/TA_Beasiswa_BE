<?php

namespace Modules\Auth\Entities;

use Illuminate\Database\Eloquent\Model;

class Generation extends Model
{
    protected $fillable = ['name'];

    protected $table = 'generations';
}
