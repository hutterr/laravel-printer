<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cegek;
use App\PrinterCounter;
use App\RepairCounter;

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
    public function javitasok()
    {
        return $this->hasMany(RepairCounter::class, 'printer_id', 'id');
    }
}
