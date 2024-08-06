<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kehilangan;
use App\Models\Ruangan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KehilanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kehilangan = Kehilangan::paginate(10);
        return view('kehilangan.read', compact('kehilangan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kehilangan.create', [
            'user' => User::orderBy('name', 'ASC')->get(),
            'barang' => Barang::orderBy('nama_barang', 'ASC')->get(),
            'ruangan' => Ruangan::orderBy('nama_ruangan', 'ASC')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Kehilangan::create($request->post());
        return redirect('kehilangan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kehilangan $kehilangan)
    {
        return view('kehilangan.show', compact('kehilangan'), []);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kehilangan $kehilangan)
    {
        return view('kehilangan.update', compact('kehilangan'), [
            'user' => User::orderBy('name', 'ASC')->get(),
            'barang' => Barang::orderBy('nama_barang', 'ASC')->get(),
            'ruangan' => Ruangan::orderBy('nama_ruangan', 'ASC')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kehilangan $kehilangan)
    {
        $kehilangan->fill($request->post())->save();
        return redirect('kehilangan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kehilangan $kehilangan)
    {
        $kehilangan->delete();
        return redirect('kehilangan');
    }

    // function cetakKehilangan(){
    //     $kehilangan = Kehilangan::all();
    //     $pdf = Pdf::loadView('kehilangan.cetak', compact('kehilangan'));
    //     return $pdf->stream();
    // }

    public function cetakKehilangan(Request $request){
        $date = Carbon::parse($request->period)->format('Y-m');
        if ($request->period){
            $kehilangan = Kehilangan::whereMonth('created_at', Carbon::parse($date)->month)
            ->whereYear('created_at', Carbon::parse($date)->year)->get();            
        }else{
            $kehilangan = Kehilangan::all();
        }
        
        $pdf = Pdf::loadView('kehilangan.cetak', compact('kehilangan'));
        return $pdf->stream();
    }
}
