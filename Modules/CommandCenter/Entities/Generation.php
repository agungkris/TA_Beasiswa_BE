<?php

namespace Modules\CommandCenter\Entities;

use Illuminate\Database\Eloquent\Model;

class Generation extends Model
{
    protected $fillable = ['generation_name'];

    protected $table = 'generation';
}
