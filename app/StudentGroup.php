<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentGroup extends Model
{
    //

    protected $table = 'student_groups';

    protected $fillable = [
        'period_id',
        'group_name',
        'topic'
    ];


    public function period(){
        return $this->belongsTo(Period::class,'period_id');
    }
}
