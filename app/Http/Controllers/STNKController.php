<?php

namespace App\Http\Controllers;

use App\Models\BPKB;
use App\Models\STNK;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class STNKController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stnk = STNK::paginate(10);
        return view('stnk.read', compact('stnk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get all bpkb data where doesn't have stnk for option
        $bpkb = BPKB::doesntHave('stnk')->get();

        return view('stnk.create', compact('bpkb'));
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
                'no_stnk' => 'max_digits:8|numeric|required',
            ],
            [
                // Name custom message for validation
                'no_stnk.required' => 'Nomor STNK Wajib Diisi !',
                'no_stnk.max_digits' => 'Nomor STNK Maksimal Hanya 8 Digit Angka !',
                'no_stnk.numeric' => 'Nomor STNK Hanya Boleh Diisi Angka !',
            ],
        );

        if ($validator->fails()) {

            return redirect('stnk/create')->with('fail_create', $validator->errors()->first());
        }

        // Get Kode Samsat for Kode Lokasi
        $bpkb = BPKB::where('id', $request->bpkb_id)->first();
        $kode_lokasi = $bpkb->samsat_sekarang->kd_samsat;

        // Simpan data ke database
        STNK::create([
            'no_stnk'               => $request->no_stnk,
            'bpkb_id'               => $request->bpkb_id,
            'warna_tnkb'            => $request->warna_tnkb,
            'kode_lokasi'           => $kode_lokasi,
            'masa_berlaku_stnk'     => Carbon::now()->addYears(5),
            'masa_berlaku_tnkb'     => Carbon::now()->addYears(5),
            'tgl_buat'              => Carbon::now(),
        ]);

        return redirect('stnk')->with('success_create', 'STNK Berhasil Di Tambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(STNK $stnk)
    {
        return view('stnk.show', compact('stnk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(STNK $stnk)
    {
        // Get all bpkb data where doesn't have stnk for option
        $bpkb = BPKB::doesntHave('stnk')->get();


        return view('stnk.update', compact('bpkb', 'stnk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, STNK $stnk)
    {
        // Validate No Polisi
        $validator = Validator::make(
            $request->all(),
            [
                'no_stnk'    => 'required|numeric|max_digits:8',
                'bpkb_id'    => 'required',
                'warna_tnkb' => 'required',
            ],
            [
                // Name custom message for validation
                'no_stnk.required' => 'Nomor STNK Wajib Diisi !',
                'no_stnk.max_digits' => 'Nomor STNK Maksimal Hanya 8 Digit Angka !',
                'no_stnk.numeric' => 'Nomor STNK Hanya Boleh Diisi Angka !',

                'bpkb_id.required' => 'Nomor BPKB Wajib Diisi !',

                'warna_tnkb.required' => 'Warna TNKB Wajib Diisi !',
            ],
        );

        if ($validator->fails()) {
            return redirect('stnk/' . $stnk->id . '/edit')->with('fail_edit', $validator->errors()->first());
        }

        // Get Kode Samsat for Kode Lokasi
        $bpkb = BPKB::where('id', $request->bpkb_id)->first();
        $kode_lokasi = $bpkb->samsat_sekarang->kd_samsat;

        // Simpan data ke database
        STNK::where('id', $stnk->id)->update([
            'no_stnk'               => $request->no_stnk,
            'bpkb_id'               => $request->bpkb_id,
            'warna_tnkb'            => $request->warna_tnkb,
            'kode_lokasi'           => $kode_lokasi,
        ]);

        return redirect('stnk')->with('success_edit', 'STNK Berhasil Di Ubah !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(STNK $stnk)
    {
        $stnk->delete();
        return redirect('stnk');
    }
}
