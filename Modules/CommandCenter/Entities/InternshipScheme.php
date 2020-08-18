<?php

namespace Modules\CommandCenter\Entities;

use Illuminate\Database\Eloquent\Model;

class InternshipScheme extends Model
{
    protected $fillable = ['internship_scheme_name'];

    protected $table = 'internship_scheme';
}
