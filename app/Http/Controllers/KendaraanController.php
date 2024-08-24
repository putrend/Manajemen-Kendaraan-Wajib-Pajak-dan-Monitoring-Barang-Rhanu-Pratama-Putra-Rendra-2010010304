<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use App\Models\Kendaraan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kendaraan = Kendaraan::paginate(10);
        return view('kendaraan.read', compact('kendaraan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kendaraan.create', [
            'dealer' => Dealer::orderBy('nama_dealer', 'ASC')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Kendaraan::create($request->post());
        return redirect('kendaraan')->with('success_create', 'Berhasil menambahkan data !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kendaraan $kendaraan)
    {
        return view('kendaraan.show', compact('kendaraan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kendaraan $kendaraan)
    {
        return view('kendaraan.update', compact('kendaraan'), [
            'dealer' => Dealer::orderBy('nama_dealer', 'ASC')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kendaraan $kendaraan)
    {
        $kendaraan->fill($request->post())->save();
        return redirect('kendaraan')->with('success_edit', 'Berhasil Mengubah Data !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kendaraan $kendaraan)
    {
        $kendaraan->delete();
        return redirect('kendaraan');
    }

    public function kendaraanCetak(Request $request)
    {
        $dealerId = $request->dealer_id;
        $status = $request->status_bpkb;

        $kendaraan = Kendaraan::where(function ($query) use ($dealerId, $status) {
            if ($dealerId) {
                $query->where('dealer_id', $dealerId);
            }

            if ($status == 'Dibuat') {
                $query->whereHas('bpkb');
            } else if ($status == 'Belum Dibuat') {
                $query->whereDoesntHave('bpkb');
            }
        })->get();

        $pdf = Pdf::loadView('kendaraan.cetak', compact('kendaraan'))->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
