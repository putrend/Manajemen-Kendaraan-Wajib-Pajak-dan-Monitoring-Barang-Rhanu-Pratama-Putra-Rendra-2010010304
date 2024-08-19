<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    protected static $roleLists = [
        1 => 'admin',
        2 => 'pegawai_uppd',
        3 => 'pegawai_samsat',
        4 => 'wajib_pajak',
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::paginate(10);
        return view('user.read', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = 0;
        if ($request->role == 'admin') {
            $role = 1;
        } else if ($request->role == 'pegawai_uppd') {
            $role = 2;
        } else if ($request->role == 'pegawai_samsat') {
            $role = 3;
        }


        // Simpan data ke database
        User::create([
            'name'      => $request->name,
            'username'  => $request->username,
            'email'     => $request->email,
            'role'      => $role,
            'password'  => Hash::make($request->password),
        ]);
        return redirect('user');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if (empty($request->password)) {
            $user->fill($request->except(['password']))->save();
        } else {
            $user->fill($request->post())->save();
        }
        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('user');
    }

    public static function roleToArray()
    {
        $lists = [];

        foreach (static::$roleLists as $key => $value) {
            $lists[$key] = $value;
        }

        return $lists;
    }
}
