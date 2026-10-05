<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function kayitFormu()
    {
        return view('auth.kayit');
    }

    public function kayit(Request $request)
    {
        $veri = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $kullanici = User::create($veri);

        Auth::login($kullanici);

        return redirect('/urunler');
    }

    public function girisFormu()
    {
        return view('auth.giris');
    }

    public function giris(Request $request)
    {
        $bilgiler = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (! Auth::attempt($bilgiler)) {
            return back()
                ->withErrors(['email' => 'E-posta veya şifre hatalı.'])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect('/urunler');
    }

    public function cikis(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/giris');
    }
}