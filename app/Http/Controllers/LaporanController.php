<?php

namespace App\Http\Controllers;

use App\Models\Dealer;
use App\Models\Samsat;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $dealer = Dealer::all();
        $samsat = Samsat::all();
        return view('laporan.index', compact('dealer', 'samsat'));
    }
}
