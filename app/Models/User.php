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

    public function box()
    {
        return $this->belongsTo(\App\Models\Box::class, 'idBox');
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function getFullNameAttribute()
    {
        return $this->attributes['lastName'] . " " . $this->attributes['firstName'];
    }
}
