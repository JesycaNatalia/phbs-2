<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\JawabanUser;
use App\Models\ResponUser;
use App\Models\Kuisoner;
use App\Models\Bulan;
use Illuminate\Http\Request;

class GformController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bulan = Bulan::orderBy('id', 'desc')->first();
        if ($bulan != null) {
            $respon_user = ResponUser::where([['bulan_id', $bulan->id], ['user_id', Auth::user()->id]])->first();
            if ($respon_user == null) {
                $kuisoner['kuisoners'] = Kuisoner::get();
                return view('user.dashboard.gformkuisoner.index', $kuisoner);
            } else {
                echo 'Kamu udah ngisi'; //nanti dibuatin view sendiri
            }
        } else {
            echo 'Kuisoner belum tersedia';
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bulan = Bulan::orderBy('id', 'desc')->first();
        foreach ($request->keys() as $index => $kuisoner_id) {

            if ($index == 0) {
                continue;
            } else {
                JawabanUser::create([
                    'bulan_id' => $bulan->id,
                    'kuisoner_id' => $kuisoner_id,
                    'isi_kuisoner_id' => $request->$kuisoner_id,
                    'user_id' => Auth::user()->id,
                ]);
            }
        }
        $jawabans = JawabanUser::with('isi_kuisoner')->where('bulan_id', $bulan->id)->get();
        $total_skor = 0;
        foreach ($jawabans as $jawaban) {
            $total_skor = $total_skor + $jawaban->isi_kuisoner->skor;
        }
        ResponUser::create([
            'bulan_id' => $bulan->id,
            'user_id' => Auth::user()->id,
            'total_skor' => $total_skor,
        ]);

        echo "Pengisian Berhasil!"; //buatin view lagi untuk ini

        // return redirect(route('user.dashboard.gform.index'))->with("OK", "Berhasil ditambahkan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
