<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class authcontroller extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function regisuser(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users',
            'nama' => 'required|min:5',
            'role' => 'required',
            'password' => 'required|min:8|max:12'
        ]);
        User::create([
            "email" => $request->email,
            "nama" => $request->nama,
            'role' => $request->role,
            "password" => Hash::make($request->password)
        ]);

        return redirect('/login');

        return back()->withErrors([
            'nama' => 'something wrong .',
        ])->onlyInput('nama');
    }

    public function login()
    {
        return view('login');
    }
    public function loginin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('loginfail', 'something wrong');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}