<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DealerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dealer = Dealer::paginate(10);
        return view('dealer.read', compact('dealer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dealer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Dealer::create($request->post());
        return redirect('dealer')->with('success_create', 'Berhasil Membuat Dealer Baru !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dealer $dealer)
    {
        $kendaraan = Kendaraan::has('dealer')->where('dealer_id', $dealer->id)->paginate(10);
        $kendaraanCount = $kendaraan->count();
        return view('dealer.show', compact('dealer', 'kendaraan', 'kendaraanCount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dealer $dealer)
    {
        return view('dealer.update', compact('dealer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dealer $dealer)
    {
        $dealer->fill($request->post())->save();
        return redirect('dealer')->with('success_edit', 'Berhasil Mengubah Dealer !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dealer $dealer)
    {
        $dealer->delete();
        return redirect('dealer');
    }

    public function dealerCetak()
    {
        $dealer = Dealer::all();
        $pdf = Pdf::loadView('dealer.cetak', compact('dealer'));
        return $pdf->stream();
    }
}
