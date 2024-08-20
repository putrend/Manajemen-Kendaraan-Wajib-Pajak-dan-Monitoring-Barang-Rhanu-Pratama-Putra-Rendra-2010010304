<?php

namespace App\Http\Controllers;

use App\Models\WajibPajak;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class WajibPajakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wajibpajak = WajibPajak::paginate(10);
        return view('wajibpajak.read', compact('wajibpajak'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wajibpajak.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->request->add(['tgl_daftar' => Carbon::now()]);
        WajibPajak::create($request->post());
        return redirect('wajib-pajak')->with('success_create', 'Wajib Pajak Berhasil Di Tambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(WajibPajak $wajibPajak)
    {
        return view('wajibpajak.show', compact('wajibPajak'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WajibPajak $wajibPajak)
    {
        return view('wajibpajak.update', compact('wajibPajak'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WajibPajak $wajibPajak)
    {
        if (empty($request->password)) {
            $wajibPajak->fill($request->except(['password']))->save();
        } else {
            $wajibPajak->fill($request->post())->save();
        }
        return redirect('wajib-pajak')->with('success_edit', 'Wajib Pajak Berhasil Diubah !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WajibPajak $wajibPajak)
    {
        $wajibPajak->delete();
        return redirect('wajib-pajak');
    }

    public function wajibpajakCetak()
    {
        $wajibpajak = WajibPajak::all();

        $pdf = FacadePdf::loadView('wajibpajak.cetak', compact('wajibpajak'));
        return $pdf->stream();
    }
}
