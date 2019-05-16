<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parts extends Model
{
    protected $guarded = [];

    public function scopeEdp($query, $edp)
    {
        if (!is_null($edp)) {
            return $query->where('edp',$edp);
        }
        
        return $query;
        
    }
    public function scopeMegnevezes($query, $megnevezes)
    {
       
        if (!is_null($megnevezes)) {
            return $query->where('megnevezes','LIKE', '%'.$megnevezes.'%');
        }
        return $query;
        
    }
}
