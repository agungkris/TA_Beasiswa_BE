<?php

namespace Modules\Auth\Entities;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $fillable = ['level', 'username', 'name', 'email', 'password'];

    protected $table = 'users';
}
