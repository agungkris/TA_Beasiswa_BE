<?php

namespace Modules\Scholarship\Entities;

use Illuminate\Database\Eloquent\Model;

class ScholarshipPaperJury extends Model
{
    protected $fillable = ['jury_id', 'submissions_id'];

    protected $table = 'scholarship_paper_jury';

    public function jury()
    {
        return $this->belongsTo(User::class, 'jury_id');
    }

    public function submissions()
    {
        return $this->belongsTo(ScholarshipSubmissions::class, 'submissions_id');
    }
}
