<?php

namespace Modules\CommandCenter\Entities;

use Illuminate\Database\Eloquent\Model;

class PublicationCategory extends Model
{
    protected $fillable = ['publication_category_name'];

    protected $table = 'publication_category';
}
