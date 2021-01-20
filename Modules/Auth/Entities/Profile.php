<?php

namespace Modules\Auth\Entities;

use Modules\Auth\Entities\Prodi;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['generation', 'prodi_id'];

    public function prodi()
    {
        return $this->belongsTo(prodi::class, 'prodi_id');
    }
}
