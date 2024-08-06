<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class STNK extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'stnk';
    public $timestamps = false;

    function bpkb()
    {
        return $this->belongsTo(BPKB::class, 'bpkb_id', 'id');
    }
}
