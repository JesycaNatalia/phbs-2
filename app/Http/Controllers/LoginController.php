<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\KartuKeluarga;
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
            return redirect()->route('user.dashboard.gform.index');
        }
    }

    public function index_register()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data_kk = KartuKeluarga::where('no_kk', $request->no_kk)->first();
        if($data_kk == null){
            $kartu_keluarga = KartuKeluarga::create([
                'no_kk' => $request->no_kk,
            ]);
        } else {
            $kartu_keluarga = $data_kk;
        }

        User::create([
            'nama' => $request->nama,
            'kartu_keluarga_id' => $kartu_keluarga->id,
            'status_kepala' => $request->status_kepala,
            'jenis_kelamin' => $request->jenis_kelamin,
            'password' => bcrypt($request->password),
            'role' => 'user'
        ]);

        return view('auth.login');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('OK', 'Berhasil logout');
    }
}
