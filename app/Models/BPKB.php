<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BPKB extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'bpkb';
    public $timestamps = false;

    function wajib_pajak()
    {
        return $this->belongsTo(WajibPajak::class);
    }

    function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }

    function samsat_awal()
    {
        return $this->belongsTo(Samsat::class);
    }

    function samsat_sekarang()
    {
        return $this->belongsTo(Samsat::class);
    }

    function stnk()
    {
        return $this->hasOne(STNK::class, 'bpkb_id', 'id');
    }
}
