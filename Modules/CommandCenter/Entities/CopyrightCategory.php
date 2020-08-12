<?php

namespace Modules\CommandCenter\Entities;

use Illuminate\Database\Eloquent\Model;

class CopyrightCategory extends Model
{
    protected $fillable = ['copyright_category_name'];

    protected $table = 'copyright_category';
}
