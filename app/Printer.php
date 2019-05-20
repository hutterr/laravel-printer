<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cegek;
use App\PrinterCounter;
use App\RepairCounter;
use App\UsedParts;

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
    public function alkatresz() 
    {
        return $this->hasMany(UsedParts::class, 'printer_id','id');
    }
    public function alkatreszReszlet()
    {
        return $this->hasOneThrough(
            'App\Parts',
            'App\UsedParts',
            'parts_id',
            'id',
            'id',
            'printer_id'
        );
    }
    public function scopeGepszam($query, $gepszam)
    {
        if (!is_null($gepszam)) {
            return $query->where('gepszam','LIKE', '%'.$gepszam.'%')->orWhere('geptipus', 'LIKE', '%'.$gepszam.'%');
        }
        
        return $query;
        
    }
}
