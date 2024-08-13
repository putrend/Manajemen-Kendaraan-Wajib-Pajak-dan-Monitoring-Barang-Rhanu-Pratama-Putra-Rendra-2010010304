<?php

namespace App\Http\Controllers;

use App\Models\WajibPajak;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {

        $request->validate([
            'masuk' => 'required',
            'password' => 'required',
        ]);

        $tipe_login = filter_var($request->masuk, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([
            $tipe_login => $request->masuk,
            'password' => $request->password,
        ])) {
            return redirect('home')->with('login_sukses', 'Login Berhasil!');
        } else {
            dd('Gagal');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
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

    // Wajib Pajak Login Section
    public function showLoginForm()
    {
        return view('wajibpajak.login');
    }

    public function loginWajibPajak(Request $request)
    {
        // Validate input
        $credentials = $request->validate([
            'no_telp' => 'required|string',
            'no_ktp' => 'required|string',
        ]);

        // Retrieve the user based on no_telp
        $user = WajibPajak::where('no_telp', $credentials['no_telp'])
            ->where('no_ktp', $credentials['no_ktp'])
            ->first();

        if ($user) {
            // Manually log the user in
            Auth::guard('wajibpajak')->login($user);
            // dd(Auth()->guard('wajibpajak')->user());

            return redirect('home')->with('login_sukses', 'Login Berhasil!');
        }

        return back()->withErrors(['no_telp' => 'No Telpon / No KTP Salah !'])->onlyInput('no_telp');
    }
}
