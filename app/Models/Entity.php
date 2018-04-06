<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entity extends Model
{
    use SoftDeletes;
    protected $table = 'entity';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    function subEntitys()
    {
        return $this->hasMany(\App\Models\SubEntity::class, 'idEntity', 'id');
    }

}
