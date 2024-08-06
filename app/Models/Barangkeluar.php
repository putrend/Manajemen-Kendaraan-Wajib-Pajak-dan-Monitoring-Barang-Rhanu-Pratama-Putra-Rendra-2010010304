<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangkeluar extends Model
{
    use HasFactory;

    protected $guarded = [];

    function barang(){
        return $this->belongsTo(Barang::class);
    }

    function ruangan(){
        return $this->belongsTo(Ruangan::class);
    }

    function user(){
        return $this->belongsTo(User::class);
    }
}
