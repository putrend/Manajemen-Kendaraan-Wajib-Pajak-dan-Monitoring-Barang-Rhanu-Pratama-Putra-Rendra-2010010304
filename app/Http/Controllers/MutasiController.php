<?php

namespace App\Http\Controllers;

use App\Models\BPKB;
use App\Models\Mutasi;
use App\Models\Samsat;
use App\Models\WajibPajak;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\MutasiBerlakuNotification;
use Illuminate\Support\Facades\Validator;
use App\Mail\MutasiDibatalkanNotification;

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
        $bpkb = BPKB::whereHas('stnk')  // Ensure BPKB has related STNK
            ->where(function ($query) {
                $query->whereHas('mutasi', function ($subQuery) {
                    // Ensure Mutasi has status "Berlaku" or "Dibatalkan"
                    $subQuery->where('status', 'Berlaku')
                        ->orWhere('status', 'Dibatalkan');
                })
                    ->orDoesntHave('mutasi');  // Or BPKB doesn't have Mutasi at all
            })
            ->where(function ($query) {
                // Exclude BPKB where only one Mutasi exists with status "Belum Berlaku"
                $query->whereDoesntHave('mutasi', function ($subQuery) {
                    // Add GROUP BY and ensure no BPKB with exactly one "Belum Berlaku" Mutasi is included
                    $subQuery->where('status', 'Belum Berlaku')
                        ->groupBy('bpkb_id')  // Group by BPKB id
                        ->havingRaw('COUNT(*) = 1');  // Check if only one record exists
                });
            })
            ->where(function ($query) {
                // Apply filter for logged-in Wajib Pajak
                if (Auth::guard('wajibpajak')->check()) {
                    $query->where('wajib_pajak_id', Auth::guard('wajibpajak')->user()->id);
                }
            })
            ->get();

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
                'bpkb_id'           => 'required',
                'samsat_tujuan_id'  => 'required',
                'wajib_pajak_id'    => 'required',
                'biaya'             => 'required',
                'no_polisi_baru'    => 'max:4|required',
            ],
            [
                // Name custom message for validation
                'bpkb_id.required'              => 'BPKB Wajib Diisi !',
                'samsat_tujuan_id.required'     => 'Samsat Tujuan Wajib Diisi !',
                'wajib_pajak_id.required'       => 'Wajib Pajak Wajib Diisi !',
                'bpkb_id.required'              => 'Biaya Wajib Diisi !',
                'no_polisi_baru.max'            => 'Nomor Polisi Maksimal Hanya 4 Angka !',
                'no_polisi_baru.required'       => 'Nomor Polisi Wajib Diisi !',
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
            'no_pol_baru'           => 'DA ' . $request->no_polisi_baru . ' ' . $samsat->kd_samsat,
            'status'                => 'Belum Berlaku',
            'biaya'                 => $request->biaya,
            'keterangan'            => $request->keterangan,
        ]);

        return redirect('mutasi')->with('success_create', 'Mutasi Berhasil Di Tambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mutasi $mutasi)
    {
        return view('mutasi.show', compact('mutasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mutasi $mutasi)
    {
        if ($mutasi->status != 'Belum Berlaku') {
            return redirect('mutasi')->with('fail_edit', 'Halaman Tidak Dapat Diakses !');
        }
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
        // Validate No Polisi
        $validator = Validator::make(
            $request->all(),
            [
                'samsat_tujuan_id'  => 'required',
                'biaya'             => 'required',
                'wajib_pajak_id'    => 'required',
                'no_polisi_baru'    => 'max:4',
            ],
            [
                // Name custom message for validation
                'biaya.required'     => 'Biaya Wajib Diisi !',
                'samsat_tujuan_id.required'     => 'Samsat Tujuan Wajib Diisi !',
                'wajib_pajak_id.required'       => 'Wajib Pajak Wajib Diisi !',
                'no_polisi_baru.max'    => 'Nomor Polisi Maksimal Hanya 4 Angka !',
            ],
        );

        if ($validator->fails()) {
            return redirect('mutasi/' . $mutasi->id . '/edit')->with('fail_edit', $validator->errors()->first());
        }

        $no_polisi_baru = $request->no_polisi_baru;
        if ($no_polisi_baru == null) {

            $no_polisi_baru = Str::between($mutasi->no_pol_baru, 'DA ', ' ' . $mutasi->samsat_tujuan->kd_samsat);
        }

        // Validate samsat tujuan
        if ($mutasi->samsat_awal->id == $request->samsat_tujuan_id) {
            return redirect('mutasi/' . $mutasi->id . '/edit')->with('fail_edit', 'Samsat Tujuan Tidak Boleh Sama Dengan Samsat Anda Sekarang !');
        }

        // Get Kode Samsat for No Pol
        $samsat = Samsat::where('id', $request->samsat_tujuan_id)->first();

        // Simpan data ke database
        Mutasi::where('id', $mutasi->id)->update([
            'samsat_tujuan_id'      => $request->samsat_tujuan_id,
            'wajib_pajak_id'        => $request->wajib_pajak_id,
            'no_pol_baru'           => 'DA ' . $no_polisi_baru . ' ' . $samsat->kd_samsat,
            'biaya'                 => $request->biaya,
            'keterangan'            => $request->keterangan,
        ]);

        return redirect('mutasi')->with('success_edit', 'Mutasi Berhasil Di Ubah !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mutasi $mutasi)
    {
        $mutasi->delete();
        return redirect('mutasi');
    }

    public function berlakukan(Mutasi $mutasi)
    {
        // // Ubah data Mutasi Menjadi Berlaku
        Mutasi::where('id', $mutasi->id)->update([
            'status'      => 'Berlaku',
        ]);

        // Ubah data samsat sekarang pada BPKB
        BPKB::where('id', $mutasi->bpkb_id)->update([
            'no_polisi' => $mutasi->no_pol_baru,
            'samsat_sekarang_id' => $mutasi->samsat_tujuan_id,
        ]);

        Mail::to($mutasi->wajib_pajak->email)
            ->send(new MutasiBerlakuNotification($mutasi));

        return redirect('mutasi/' . $mutasi->id)->with('success_berlaku', 'Mutasi Berhasil Diberlakukan !');
    }

    public function batalkan(Request $request, Mutasi $mutasi)
    {
        // Ubah data Mutasi Menjadi Berlaku
        Mutasi::where('id', $mutasi->id)->update([
            'keterangan'  => $request->keterangan,
            'status'      => 'Dibatalkan',
        ]);

        Mail::to($mutasi->wajib_pajak->email)
            ->send(new MutasiDibatalkanNotification($mutasi));

        return redirect('mutasi/' . $mutasi->id)->with('success_dibatalkan', 'Mutasi Berhasil Dibatalkan !');
    }
}
