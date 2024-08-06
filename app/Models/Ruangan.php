<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;

    protected $guarded = [];

    function barangkeluar(){
        return $this->hasMany(Barangkeluar::class);
    }

    function kerusakan(){
        return $this->hasMany(Kerusakan::class);
    }

    function kehilangan(){
        return $this->hasMany(Kehilangan::class);
    }

    function perbaikan(){
        return $this->hasMany(Perbaikan::class);
    }
}
