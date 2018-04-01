<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Box extends Model
{

    use SoftDeletes;

    protected $table = 'box';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'description', 'idSubEntity'];

    function subEntity()
    {
        return $this->belongsTo(\App\Models\SubEntity::class);
    }

    function calls()
    {
        return $this->hasMany(\App\Models\Call::class, 'idBox', 'id');
    }
}
