<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\BPKB;
use App\Models\Samsat;
use App\Models\Kendaraan;
use App\Models\WajibPajak;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Validator;

class BPKBController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bpkb = BPKB::paginate(10);
        return view('bpkb.read', compact('bpkb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get all samsat data for option
        $samsat = Samsat::all();

        // Get all kendaraan data where doesn't have bpkb for option
        $kendaraan = Kendaraan::doesntHave('bpkb')->get();

        // Get all wajib pajak data for option
        $wajibpajak = WajibPajak::all();

        return view('bpkb.create', compact('samsat', 'kendaraan', 'wajibpajak'));
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

            return redirect('bpkb/create')->with('fail_create', $validator->errors()->first());
        }

        // Get Kode Samsat for No Pol
        $samsat = Samsat::where('id', $request->samsat_awal_id)->first();

        // Simpan data ke database
        BPKB::create([
            'no_bpkb'               => $request->no_bpkb,
            'no_polisi'             => 'DA ' . $request->no_polisi . ' ' . $samsat->kd_samsat,
            'tahun_buat'            => Carbon::now(),
            'keterangan'            => $request->keterangan,
            'wajib_pajak_id'        => $request->wajib_pajak_id,
            'samsat_awal_id'        => $request->samsat_awal_id,
            'samsat_sekarang_id'    => $request->samsat_awal_id,
            'pajak'                 => $request->pajak,
            'kendaraan_id'          => $request->kendaraan_id,
        ]);

        return redirect('bpkb')->with('success_create', 'BPKB Berhasil Di Tambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(BPKB $bpkb)
    {
        return view('bpkb.show', compact('bpkb'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BPKB $bpkb)
    {
        // Get All Wajib Pajak Data For Option
        $wajibpajak = WajibPajak::all();

        // Get all kendaraan data where doesn't have bpkb for option
        $kendaraan = Kendaraan::doesntHave('bpkb')->get();

        // Get all samsat data for option
        $samsat = Samsat::all();


        return view('bpkb.update', compact('bpkb', 'kendaraan', 'samsat', 'wajibpajak'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BPKB $bpkb)
    {
        // Validate No Polisi
        $validator = Validator::make(
            $request->all(),
            [
                'no_polisi' => 'max_digits:4|numeric',
            ],
            [
                // Name custom message for validation
                'no_polisi.max_digits'     => 'Nomor Polisi Maksimal Hanya 4 Angka !',
                'no_polisi.numeric' => 'Nomor Polisi Hanya Boleh Diisi Angka !',
            ],
        );

        if ($validator->fails()) {
            return redirect('bpkb/' . $bpkb->id . '/edit')->with('fail_edit', $validator->errors()->first());
        }

        // dd($request->no_polisi);

        // Simpan data ke database
        BPKB::where('id', $bpkb->id)->update([
            'no_bpkb'               => $request->no_bpkb,
            'no_polisi'             => 'DA ' . $request->no_polisi . ' ' . $bpkb->samsat_sekarang->kd_samsat,
            'pajak'                 => $request->pajak,
            'keterangan'            => $request->keterangan,
        ]);

        return redirect('bpkb')->with('success_edit', 'BPKB Berhasil Di Ubah !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BPKB $bpkb)
    {
        $bpkb->delete();
        return redirect('bpkb');
    }

    public function bpkbCetak(Request $request)
    {
        $samsatId = $request->samsat_id;
        $status = $request->status_stnk;

        $bpkb = BPKB::where(function ($query) use ($samsatId, $status) {
            if ($samsatId) {
                $query->where('samsat_sekarang_id', $samsatId);
            }

            if ($status == 'Dibuat') {
                $query->whereHas('stnk');
            } else if ($status == 'Belum Dibuat') {
                $query->whereDoesntHave('stnk');
            }
        })->get();

        $pdf = Pdf::loadView('bpkb.cetak', compact('bpkb'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
