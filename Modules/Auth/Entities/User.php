<?php

namespace Modules\Auth\Entities;

use App\StudentGroup;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Scholarship\Entities\ScholarshipCategoryJury;
use Modules\Scholarship\Entities\ScholarshipStudentGroup;
use Modules\Scholarship\Entities\ScholarshipStudentGroupMembers;
use Modules\Scholarship\Entities\ScholarshipSubmissions;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'level', 'name', 'email', 'password', 'is_achievement',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class, 'user_id');
    }

    public function group()
    {
        return $this->hasOne(ScholarshipStudentGroupMembers::class, 'student_id', 'id');
    }

    // public function prodi()
    // {
    //     return $this->hasOne(Profile::class, 'prodi_id');
    // }

    public function category_jury()
    {
        return $this->hasOne(ScholarshipCategoryJury::class, 'jury_id');
    }

    public function paper_jury()
    {
        // return $this->belongsToMany(ScholarshipSubmissions::class, 'scholarship_paper_jury', 'submissions_id', 'jury_id');
        return $this->belongsToMany(ScholarshipSubmissions::class, 'scholarship_paper_jury', 'jury_id', 'submissions_id');
    }
}
