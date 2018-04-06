<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    protected $table = 'number';
    protected $primaryKey = 'id';
    protected $fillable = ['number', 'code', 'start', 'recalls', 'end', 'idPrefix'];
    public $timestamps = false;

    function prefix()
    {
        return $this->belongsTo(\App\Models\Prefix::class, 'idPrefix');
    }

    function calls()
    {
        return $this->hasMany(\App\Models\Call::class, 'idNumber', 'id');
    }
}
