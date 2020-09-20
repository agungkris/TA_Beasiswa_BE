<?php

namespace Modules\Auth\Entities;

use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    protected $fillable = ['nama_prodi', 'singkatan_prodi', 'fakultas_id', 'logo'];

    protected $table = 'prodi';

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }
}
