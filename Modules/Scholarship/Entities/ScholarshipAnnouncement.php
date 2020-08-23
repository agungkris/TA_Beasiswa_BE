<?php

namespace Modules\Scholarship\Entities;

use Illuminate\Database\Eloquent\Model;

class ScholarshipAnnouncement extends Model
{
    protected $fillable = ['title', 'description', 'document'];

    protected $table = 'scholarship_announcement';
}
