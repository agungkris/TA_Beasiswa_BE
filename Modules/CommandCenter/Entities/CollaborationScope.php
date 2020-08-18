<?php

namespace Modules\CommandCenter\Entities;

use Illuminate\Database\Eloquent\Model;

class CollaborationScope extends Model
{
    protected $fillable = ['collaboration_scope_name'];

    protected $table = 'collaboration_scope';
}
