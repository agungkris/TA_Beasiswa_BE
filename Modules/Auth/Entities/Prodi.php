<?php

namespace Modules\Auth\Entities;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $fillable = ['name'];

    protected $table = 'prodi';
}
