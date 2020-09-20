<?php

namespace Modules\CommandCenter\Entities;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    protected $fillable = ['generation_id','message'];

    protected $table = 'forum';

    public function generation()
    {
        return $this->belongsTo(Generation::class, 'generation_id');
    }

}
