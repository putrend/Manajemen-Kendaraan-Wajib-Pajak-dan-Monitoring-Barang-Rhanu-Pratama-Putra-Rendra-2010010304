<?php

namespace App\Http\Controllers;

use App\Models\Samsat;
use Illuminate\Http\Request;

class SamsatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $samsat = Samsat::paginate(10);
        return view('samsat.read', compact('samsat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('samsat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Samsat::create($request->post());
        return redirect('samsat')->with('success_create', 'Berhasil Membuat Samsat Baru !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Samsat $samsat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Samsat $samsat)
    {
        return view('samsat.update', compact('samsat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Samsat $samsat)
    {
        $samsat->fill($request->post())->save();
        return redirect('samsat')->with('success_edit', 'Berhasil Mengubah Samsat !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Samsat $samsat)
    {
        $samsat->delete();
        return redirect('samsat');
    }
}
