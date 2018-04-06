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
    protected $hidden = ['updated_at', 'deleted_at'];

    function entity()
    {
        return $this->belongsTo(\App\Models\Entity::class, 'idEntity');
    }

    function prefix()
    {
        return $this->hasOne(\App\Models\Prefix::class, 'idSubEntity', 'id');
    }

    function boxes()
    {
        return $this->hasMany(\App\Models\Box::class, 'idSubEntity', 'id');
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = htmlspecialchars($value);
    }

    public function getNameAttribute()
    {
        return htmlspecialchars_decode($this->attributes['name']);
    }
}
