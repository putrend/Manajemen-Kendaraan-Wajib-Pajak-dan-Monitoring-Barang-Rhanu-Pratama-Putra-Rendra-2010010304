<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WajibPajak extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    function bpkb()
    {
        return $this->hasMany(BPKB::class);
    }
}
