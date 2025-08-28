<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("login.index");
    }


    public function loginAction(Request $request)
    {
        try {
            // validasi input
            $request->validate([
                'email'    => 'required|email',
                'password' => 'required|string'
            ]);
        
            // coba login
            if (Auth::attempt($request->only('email', 'password'))) {
                // login berhasil
                $request->session()->regenerate(); // supaya session aman
                return redirect()->intended('/dashboard'); // redirect ke dashboard
            } else {
                // login gagal
                return back()->withErrors([
                    'email' => 'Email atau password salah!',
                ])->withInput(); // kembali ke form login, tetap tampilkan email
            }
        } catch (\Throwable $th) {
            // kalau ada error lain
            return back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/'); // balik ke halaman login
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
