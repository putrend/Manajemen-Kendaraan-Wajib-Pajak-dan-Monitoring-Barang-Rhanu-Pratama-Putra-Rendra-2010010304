<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class WajibPajak extends Authenticatable
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public function getAuthPassword()
    {
        return $this->no_ktp;
    }

    public function bpkb()
    {
        return $this->hasMany(BPKB::class);
    }

    public function mutasi()
    {
        return $this->hasMany(Mutasi::class);
    }
}
