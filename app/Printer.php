<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cegek;

class Printer extends Model
{
    protected $guarded = [];

    public function ceg()
    {
        return $this->belongsTo(Cegek::class, 'ceg_id', 'id');
    }
}
