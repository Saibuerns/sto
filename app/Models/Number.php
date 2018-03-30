<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['number', 'code', 'idPrefix'];

    function prefix()
    {
        return $this->belongsTo(\App\Models\Prefix::class);
    }

    function calls()
    {
        return $this->hasMany(\App\Models\Call::class, 'idNumber', 'id');
    }
}
