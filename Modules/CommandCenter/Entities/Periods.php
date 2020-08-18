<?php

namespace Modules\CommandCenter\Entities;

use Illuminate\Database\Eloquent\Model;

class Periods extends Model
{
    protected $fillable = ['period_name'];

    protected $table = 'periods';

}
