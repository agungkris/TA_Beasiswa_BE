<?php

namespace Modules\CommandCenter\Entities;

use Illuminate\Database\Eloquent\Model;

class ScopeCategory extends Model
{
    protected $fillable = ['scope_name'];

    protected $table = 'scope_category';
}
