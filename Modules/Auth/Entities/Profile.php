<?php

namespace Modules\Auth\Entities;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['generation_id', 'prodi_id'];

    public function generation()
    {
        return $this->belongsTo(generations::class, 'generation_id');
    }

    public function prodi()
    {
        return $this->belongsTo(prodi::class, 'prodi_id');
    }
}
