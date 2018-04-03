<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    use Authenticatable, CanResetPassword, SoftDeletes;

    protected $fillable = ['lastName', 'firstName', 'email', 'password', 'idBox'];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
