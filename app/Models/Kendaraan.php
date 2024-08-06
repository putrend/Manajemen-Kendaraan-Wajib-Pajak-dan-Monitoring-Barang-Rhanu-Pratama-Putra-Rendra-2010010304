<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    function dealer()
    {
        return $this->belongsTo(Dealer::class);
    }

    function bpkb()
    {
        return $this->hasOne(BPKB::class);
    }
}
