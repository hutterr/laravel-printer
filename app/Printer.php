<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cegek;
use App\PrinterCounter;

class Printer extends Model
{
    protected $guarded = [];

    public function ceg()
    {
        return $this->belongsTo(Cegek::class, 'ceg_id', 'id');
    }
    public function szamlalo()
    {
        return $this->hasMany(PrinterCounter::class, 'printer_id', 'id');
    }
}
