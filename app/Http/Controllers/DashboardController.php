<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Mutasi;
use App\Models\Ruangan;
use App\Models\Kerusakan;
use App\Models\Barangkeluar;
use App\Models\Dealer;
use App\Models\Kendaraan;
use App\Models\WajibPajak;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::count();
        $ruangan = Ruangan::count();
        $barangkeluar = Barangkeluar::count();
        $kerusakan = Kerusakan::count();
        $mutasi = Mutasi::count();
        $wajibpajak = WajibPajak::count();
        $dealer = Dealer::count();
        $kendaraan = Kendaraan::count();

        if (Auth()->guard('wajibpajak')->check()) {
            $wpId = Auth()->guard('wajibpajak')->user()->id;
            $mutasi = Mutasi::where('wajib_pajak_id', $wpId)->count();
        }

        return view('home', compact('barang', 'ruangan', 'barangkeluar', 'kerusakan', 'mutasi', 'wajibpajak', 'dealer', 'kendaraan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
