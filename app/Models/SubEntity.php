<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubEntity extends Model
{
    use SoftDeletes;

    protected $table = 'sub_entity';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description'];

    function entity()
    {
        return $this->belongsTo(\App\Models\Entity::class);
    }

    function prefixs()
    {
        return $this->hasMany(\App\Models\Prefix::class, 'idSubEntity', 'id');
    }

    function boxes()
    {
        return $this->hasMany(\App\Models\Box::class, 'idSubEntity', 'id');
    }

}
