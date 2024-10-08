<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Samsat extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    function bpkb()
    {
        return $this->hasMany(BPKB::class);
    }

    function mutasi()
    {
        return $this->hasMany(Mutasi::class);
    }
}
