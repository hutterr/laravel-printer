<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Printer;

class RepairCounter extends Model
{
    protected $guarded = [];

    public function nyomtato()
    {
        return $this->belongsTo(Printer::class, 'printer_id', 'id');
    }
}
