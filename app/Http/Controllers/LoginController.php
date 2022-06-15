<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kuisoner;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $user = User::where('nama', $request->nama)->first();
        if ($user == null) {
            return redirect()->back()->with('ERR', 'Nama yang Anda masukkan tidak terdaftar.');
        }
        if (!Auth::attempt(['nama' => $request->nama, 'password' => $request->password])) {
            return redirect()->back()->with('ERR', 'Password yang Anda masukkan salah.');
        }

        $kuisoner['kuisoners'] = Kuisoner::get();
        if (Auth::user()->role == 'admin') {
            return view('admin.dashboard.kuisoner.index', $kuisoner);
        } else {
            return redirect()->route('kuisoner');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('OK', 'Berhasil logout');
    }
}
