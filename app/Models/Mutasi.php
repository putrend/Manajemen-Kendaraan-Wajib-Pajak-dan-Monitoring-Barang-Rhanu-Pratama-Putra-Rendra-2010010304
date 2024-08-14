<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    function bpkb()
    {
        return $this->belongsTo(BPKB::class, 'bpkb_id', 'id');
    }

    function samsat_awal()
    {
        return $this->belongsTo(Samsat::class);
    }

    function samsat_tujuan()
    {
        return $this->belongsTo(Samsat::class);
    }

    function wajib_pajak()
    {
        return $this->belongsTo(WajibPajak::class);
    }
}
