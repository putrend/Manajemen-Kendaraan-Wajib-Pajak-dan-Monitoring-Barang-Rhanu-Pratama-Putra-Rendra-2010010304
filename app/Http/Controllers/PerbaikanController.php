<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Perbaikan;
use App\Models\Ruangan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PerbaikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perbaikan = Perbaikan::paginate(10);
        return view('perbaikan.read', compact('perbaikan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('perbaikan.create', [
            'user' => User::orderBy('name', 'ASC')->get(),
            'ruangan' => Ruangan::orderBy('nama_ruangan', 'ASC')->get(),
            'barang' => Barang::orderBy('nama_barang', 'ASC')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Perbaikan::create($request->post());
        return redirect('perbaikan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Perbaikan $perbaikan)
    {
        return view('perbaikan.show', compact('perbaikan'), []);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perbaikan $perbaikan)
    {
        return view('perbaikan.update', compact('perbaikan'), [
            'user' => User::orderBy('name', 'ASC')->get(),
            'ruangan' => Ruangan::orderBy('nama_ruangan', 'ASC')->get(),
            'barang' => Barang::orderBy('nama_barang', 'ASC')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perbaikan $perbaikan)
    {
        $perbaikan->fill($request->post())->save();
        return redirect('perbaikan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perbaikan $perbaikan)
    {
        $perbaikan->delete();
        return redirect('perbaikan');
    }

    // function perbaikanCetak(){
    //     $perbaikan = Perbaikan::all();
    //     $pdf = Pdf::loadView('perbaikan.cetak', compact('perbaikan'));
    //     return $pdf->stream();
    // }

    public function perbaikanCetak(Request $request){
        $date = Carbon::parse($request->period)->format('Y-m');
        if ($request->period){
            $perbaikan = Perbaikan::whereMonth('created_at', Carbon::parse($date)->month)
            ->whereYear('created_at', Carbon::parse($date)->year)->get();            
        }else{
            $perbaikan = Perbaikan::all();
        }
        
        $pdf = Pdf::loadView('perbaikan.cetak', compact('perbaikan'));
        return $pdf->stream();
    }
}
