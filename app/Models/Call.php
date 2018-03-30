<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['start', 'recalls', 'end', 'idNumber', 'idBox'];
    protected $dates = ['start', 'end'];

    function number()
    {
        return $this->belongsTo(\App\Models\Number::class);
    }

    function box()
    {
        return $this->belongsTo(\App\Models\Box::class);
    }
}
