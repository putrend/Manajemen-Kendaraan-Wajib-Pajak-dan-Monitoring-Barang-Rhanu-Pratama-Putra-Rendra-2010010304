<?php

namespace App\Http\Controllers;

use App\Models\BPKB;
use App\Models\Mutasi;
use App\Models\Samsat;
use App\Models\WajibPajak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MutasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::guard('wajibpajak')->check()) {
            $mutasi = Mutasi::where('wajib_pajak_id', Auth::guard('wajibpajak')->user()->id)->paginate(10);
        } else {
            $mutasi = Mutasi::paginate(10);
        }
        return view('mutasi.read', compact('mutasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get all bpkb data
        $bpkb = BPKB::whereHas('stnk')
            ->where(function ($query) {
                $query->whereHas('mutasi', function ($subQuery) {
                    $subQuery->where('status', 'Berlaku'); // Ensure Mutasi has status "Berlaku"
                })->orDoesntHave('mutasi'); // Or ensure BPKB does not have related Mutasi
            })
            ->where(function ($query) {
                if (Auth::guard('wajibpajak')->check()) {
                    $query->where('wajib_pajak_id', Auth::guard('wajibpajak')->user()->id);
                }
            })->get();

        // Get all samsat data
        $samsat = Samsat::all();

        // Get all wajib pajak data
        $wajibpajak = WajibPajak::all();

        return view('mutasi.create', compact('bpkb', 'samsat', 'wajibpajak'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate No Polisi
        $validator = Validator::make(
            $request->all(),
            [
                'no_polisi' => 'max:4',
            ],
            [
                // Name custom message for validation
                'no_polisi.max' => 'Nomor Polisi Maksimal Hanya 4 Angka !',
            ],
        );

        if ($validator->fails()) {
            return redirect('mutasi/create')->with('fail_create', $validator->errors()->first());
        }

        // Validate samsat tujuan
        // Get bpkb data from request
        $bpkb = BPKB::where('id', $request->bpkb_id)->first();

        if ($bpkb->samsat_sekarang_id == $request->samsat_tujuan_id) {
            return redirect('mutasi/create')->with('fail_create', 'Samsat Tujuan Tidak Boleh Sama Dengan Samsat Anda Sekarang !');
        }

        // Get Kode Samsat for No Pol
        $samsat = Samsat::where('id', $request->samsat_tujuan_id)->first();

        // Simpan data ke database
        Mutasi::create([
            'bpkb_id'               => $request->bpkb_id,
            'wajib_pajak_id'        => $request->wajib_pajak_id,
            'samsat_awal_id'        => $bpkb->samsat_sekarang_id,
            'samsat_tujuan_id'      => $request->samsat_tujuan_id,
            'no_pol_lama'           => $bpkb->no_polisi,
            'no_pol_baru'           => 'DA ' . $request->no_polisi . ' ' . $samsat->kd_samsat,
            'status'                => 'Belum Berlaku',
            'keterangan'            => $request->keterangan,
        ]);

        return redirect('mutasi')->with('success_create', 'Mutasi Berhasil Di Tambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mutasi $mutasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mutasi $mutasi)
    {
        // Get all bpkb data
        $bpkb = BPKB::whereHas('stnk')
            ->where(function ($query) {
                $query->whereHas('mutasi', function ($subQuery) {
                    $subQuery->where('status', 'Sudah Berlaku'); // Ensure Mutasi has status "Sudah Berlaku"
                })->orDoesntHave('mutasi'); // Or ensure BPKB does not have related Mutasi
            })
            ->get();

        // Get all samsat data
        $samsat = Samsat::all();

        // Get all wajib pajak data
        $wajibpajak = WajibPajak::all();

        return view('mutasi.update', compact('mutasi', 'bpkb', 'samsat', 'wajibpajak'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mutasi $mutasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mutasi $mutasi)
    {
        //
    }
}
