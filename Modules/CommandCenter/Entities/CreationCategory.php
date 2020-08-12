<?php

namespace Modules\CommandCenter\Entities;

use Illuminate\Database\Eloquent\Model;

class CreationCategory extends Model
{
   
    protected $fillable = ['creation_category_name'];

    protected $table = 'creation_category';
}
