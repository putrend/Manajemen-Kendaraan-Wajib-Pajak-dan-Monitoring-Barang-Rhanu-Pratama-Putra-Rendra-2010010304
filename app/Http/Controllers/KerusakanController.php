<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kerusakan;
use App\Models\Ruangan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class KerusakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kerusakan = Kerusakan::paginate(10);
        return view('kerusakan.read', compact('kerusakan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kerusakan.create', [
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
        Kerusakan::create($request->post());
        return redirect('kerusakan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kerusakan $kerusakan)
    {
        return view('kerusakan.show', compact('kerusakan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kerusakan $kerusakan)
    {
        return view('kerusakan.update', compact('kerusakan'), [
            'barang' => Barang::orderBy('nama_barang', 'ASC')->get(),
            'ruangan' => Ruangan::orderBy('nama_ruangan', 'ASC')->get(),
            'user' => User::orderBy('name', 'ASC')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kerusakan $kerusakan)
    {
        $kerusakan->fill($request->post())->save();
        return redirect('kerusakan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kerusakan $kerusakan)
    {
        $kerusakan->delete();
        return redirect('kerusakan');
    }

    // function kerusakanCetak(){
    //     $kerusakan = Kerusakan::all();
    //     $pdf = FacadePdf::loadView('kerusakan.cetak', compact('kerusakan'));
    //     return $pdf->stream();
    // }

    public function kerusakanCetak(Request $request){
        $date = Carbon::parse($request->period)->format('Y-m');
        if ($request->period){
            $kerusakan = Kerusakan::whereMonth('created_at', Carbon::parse($date)->month)
            ->whereYear('created_at', Carbon::parse($date)->year)->get();            
        }else{
            $kerusakan = Kerusakan::all();
        }
        
        $pdf = FacadePdf::loadView('kerusakan.cetak', compact('kerusakan'));
        return $pdf->stream();
    }
}
