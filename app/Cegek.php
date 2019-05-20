<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Printer;

class Cegek extends Model
{
    protected $table = 'cegek';
    protected $guarded = [];

    public function printer()
    {
        return $this->hasMany(Printer::class, 'ceg_id', 'id');
    }

    public function scopeNev($query, $cegnev)
    {
        if (!is_null($cegnev)) {
            return $query->where('cegnev','LIKE', '%'.$cegnev.'%');
        }
        
        return $query;
        
    }
}
