<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $table = 'call';
    protected $primaryKey = 'id';
    protected $fillable = ['idNumber', 'idBox'];
    public $timestamps = false;

    function number()
    {
        return $this->belongsTo(\App\Models\Number::class, 'idNumber');
    }

    function box()
    {
        return $this->belongsTo(\App\Models\Box::class, 'idBox');
    }
}
