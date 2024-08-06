<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Ruangan;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ruangan = Ruangan::paginate(10);
        return view('ruangan.read', compact('ruangan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ruangan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Ruangan::create($request->post());
        return redirect(('ruangan'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Ruangan $ruangan)
    {
        return view('ruangan.show', compact('ruangan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ruangan $ruangan)
    {
        return view('ruangan.update', compact('ruangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ruangan $ruangan)
    {
        $ruangan->fill($request->post())->save();
        return redirect('ruangan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ruangan $ruangan)
    {
        $ruangan->delete();
        return redirect('ruangan');
    }

//     function ruanganCetak(){
//         $ruangan = Ruangan::all();
//         $pdf = FacadePdf::loadView('ruangan.cetak', compact('ruangan'));
//         return $pdf->stream();
//     }

    public function ruanganCetak(Request $request){
        $date = Carbon::parse($request->period)->format('Y-m');
        if ($request->period){
            $ruangan = Ruangan::whereMonth('created_at', Carbon::parse($date)->month)
            ->whereYear('created_at', Carbon::parse($date)->year)->get();            
        }else{
            $ruangan = Ruangan::all();
        }
        
        $pdf = FacadePdf::loadView('ruangan.cetak', compact('ruangan'));
        return $pdf->stream();
    }
}
