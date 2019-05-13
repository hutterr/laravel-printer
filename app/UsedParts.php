<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Parts;

class UsedParts extends Model
{
    protected $guarded = [];

    public function alkatresz()
    {
        return $this->belongsTo(Parts::class, 'parts_id', 'id');
    }
    public function nyomtato()
    {
        return $this->belongsTo(Printer::class, 'printer_id', 'id');
    }
}
