<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Barangkeluar;
use App\Models\Ruangan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
//use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class BarangkeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangkeluar = Barangkeluar::paginate(10);
        return view('barangkeluar.read', compact('barangkeluar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('barangkeluar.create', [
            'barang' => Barang::orderBy('nama_barang', 'ASC')->get(),
            'ruangan' => Ruangan::orderBy('nama_ruangan', 'ASC')->get(),
            'user' => User::orderBy('name', 'ASC')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $barang = Barang::where('id', $request->barang_id)->first();
        $jmlBarang = $barang->jumlah_barang;
        
        if($request->jumlah_keluar > $jmlBarang || $request->jumlah_keluar == 0) {
            return redirect('barangkeluar/create')->with('fail_create', 'Gagal menambahkan data barang keluar, jumlah barang yang keluar melebihi jumlah stok gudang !');
        } else {
            $barang->jumlah_barang = $jmlBarang - $request->jumlah_keluar;
            $barang->save();
    
            Barangkeluar::create($request->post());
            return redirect('barangkeluar')->with('success_create', 'Berhasil menambahkan data !');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Barangkeluar $barangkeluar)
    {
        return view('barangkeluar.show', compact('barangkeluar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barangkeluar $barangkeluar)
    {
        return view('barangkeluar.update', compact('barangkeluar'), [
            'barang' => Barang::orderBy('nama_barang', 'ASC')->get(),
            'ruangan' => Ruangan::orderBy('nama_ruangan', 'ASC')->get(),
            'user' => User::orderBy('name', 'ASC')->get()
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barangkeluar $barangkeluar)
    {
        $barang = Barang::where('id', $request->barang_id)->first();
        $jmlBarang = $barang->jumlah_barang;

        $getAllBarangId = Barangkeluar::where('barang_id', $request->barang_id)->get();
        $totalAktualBarang = 0 + $barang->jumlah_barang;
        foreach ($getAllBarangId as $item) {
            $totalAktualBarang += $item->jumlah_keluar;
        }

        // dd($barangkeluar->jumlah_keluar);
        if($request->jumlah_keluar == 0) {
            return redirect('barangkeluar/'.$barangkeluar->id.'/edit')->with('fail_edit', 'Gagal mengubah data barang keluar, pastikan jumlah barang tidak 0 !');
        } else {
            if ($request->jumlah_keluar > $totalAktualBarang) {
                return redirect('barangkeluar/'.$barangkeluar->id.'/edit')->with('fail_edit', 'Gagal mengubah data barang keluar, pastikan jumlah barang tidak melebihi total stok barang masuk !');
            } else {
                if ($barangkeluar->jumlah_keluar > $request->jumlah_keluar) {
                    $total = $barangkeluar->jumlah_keluar - $request->jumlah_keluar;
                    $barang->jumlah_barang = $jmlBarang + $total;
                } elseif ($barangkeluar->jumlah_keluar < $request->jumlah_keluar) {
                    $total = $request->jumlah_keluar - $barangkeluar->jumlah_keluar;
                    if (($jmlBarang - $total) < 0) {
                        return redirect('barangkeluar/'.$barangkeluar->id.'/edit')->with('fail_edit', 'Gagal mengubah data barang keluar, pastikan jumlah barang tidak melebihi total stok barang masuk !');
                    } elseif ($total > $jmlBarang) {
                        return redirect('barangkeluar/'.$barangkeluar->id.'/edit')->with('fail_edit', 'Gagal mengubah data barang keluar, pastikan jumlah barang tidak melebihi total stok barang masuk !');
                    } else {
                        $barang->jumlah_barang = $jmlBarang - $total;
                    }
                }
                $barang->save();
                $barangkeluar->fill($request->post())->save();
                return redirect('barangkeluar')->with('success_edit', 'Berhasil mengubah data !');
            }
        }

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barangkeluar $barangkeluar)
    {
        $barang = Barang::where('id', $barangkeluar->barang_id)->first();
        $jmlBarang = $barang->jumlah_barang;

        $barang->jumlah_barang = $jmlBarang + $barangkeluar->jumlah_keluar;
        $barang->save();

        $barangkeluar->delete();
        return redirect('barangkeluar');
    }

    // function barangkeluarCetak(){
    //     $barangkeluar = Barangkeluar::all();
    //     $pdf = FacadePdf::loadView('barangkeluar.cetak', compact('barangkeluar'));
    //     return $pdf->stream();
    // }

    public function barangkeluarCetak(Request $request){
        $date = Carbon::parse($request->period)->format('Y-m');
        if ($request->period){
            $barangkeluar = Barangkeluar::whereMonth('created_at', Carbon::parse($date)->month)
            ->whereYear('created_at', Carbon::parse($date)->year)->get();            
        }else{
            $barangkeluar = Barangkeluar::all();
        }
        
        $pdf = FacadePdf::loadView('barangkeluar.cetak', compact('barangkeluar'));
        return $pdf->stream();
    }
}
