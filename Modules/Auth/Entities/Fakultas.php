<?php

namespace Modules\Auth\Entities;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    protected $fillable = ['nama_fakultas', 'singkatan_fakultas'];

    protected $table = 'fakultas';
}
