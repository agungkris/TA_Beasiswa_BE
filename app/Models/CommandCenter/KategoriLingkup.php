<?php

namespace App\Models\CommandCenter;

use Illuminate\Database\Eloquent\Model;

class KategoriLingkup extends Model
{
    protected $table = 'kategori_lingkup';

    protected $fillable = [
        'name',
        'description'
    ];
}
