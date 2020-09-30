<?php

namespace Modules\Auth\Entities;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['generation', 'prodi'];
}
