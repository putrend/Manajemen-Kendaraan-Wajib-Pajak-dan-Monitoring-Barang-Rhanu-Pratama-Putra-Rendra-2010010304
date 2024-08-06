<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = Barang::paginate(10);
        return view('barang.read', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barang.create', [
            'kategori' => Kategori::orderBy('nama_kategori', 'ASC')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Barang::create($request->post());
        return redirect('barang');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        return view('barang.show', compact('barang'), []);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('barang.update', compact('barang'), [
            'kategori' => Kategori::orderBy('nama_kategori', 'ASC')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $barang->fill($request->post())->save();
        return redirect('barang');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect('barang');
    }

    public function barangCetak(Request $request)
    {
        $date = Carbon::parse($request->period)->format('Y-m');
        if ($request->period) {
            $barang = Barang::whereMonth('created_at', Carbon::parse($date)->month)
                ->whereYear('created_at', Carbon::parse($date)->year)->get();
        } else {
            $barang = Barang::all();
        }

        $pdf = Pdf::loadView('barang.cetak', compact('barang'));
        return $pdf->stream();
        //return view('barang.cetak', compact($barang));
        //$barang = Barang::all();
    }
}
