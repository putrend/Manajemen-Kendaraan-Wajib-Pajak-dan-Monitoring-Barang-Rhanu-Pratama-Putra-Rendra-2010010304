<?php

namespace App\Http\Controllers;

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

    public function login(Request $request){
        
        $request->validate([
            'masuk' => 'required',
            'password' => 'required',
        ]);
    
        $tipe_login = filter_var($request->masuk, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        
        if(Auth::attempt([
            $tipe_login => $request->masuk,
            'password' => $request->password,
        ])){
            return redirect('home')->with('login_sukses', 'Login Berhasil!');
        } else {
            dd('Gagal');
        }
    }

    public function logout(){
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
}
