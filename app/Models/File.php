<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class File extends Model
{
    use SoftDeletes;
    protected $table = 'file';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'path', 'extension', 'type'];

    public function getUrlAttribute()
    {
        $url = $this->attributes['path'];
        if (strlen($url) > 11) {
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i',
                $url, $match)) {
                return $match[1];
            } else {
                return false;
            }
        }
        return $url;
    }
}
