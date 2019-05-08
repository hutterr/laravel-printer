<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Printer;

class PrinterCounter extends Model
{
    protected $table = 'printer_counters';
    protected $guarded = [];

    public function nyomtato()
    {
        return $this->belongsTo(Printer::class, 'printer_id', 'id');
    }
    public function nyomtatoCeg()
    {
        return $this->hasOneThrough('App\Cegek', 'App\Printer', 'id', 'id', 'printer_id', 'ceg_id');
    }
}
