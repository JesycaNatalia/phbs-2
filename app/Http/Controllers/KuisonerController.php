<?php

namespace App\Http\Controllers;

use App\Models\Kuisoner;
use Illuminate\Http\Request;


class KuisonerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kuisoner['kuisoners'] = Kuisoner::get();
        return view('admin.dashboard.kuisoner.index', $kuisoner);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.kuisoner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Kuisoner::create([
            'pertanyaan' => $request->pertanyaan,
            'status_pertanyaan' => $request->status_pertanyaan,
        ]);

        return redirect()->back()->with("OK", "Berhasil ditambahkan.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kuisoner  $kuisoner
     * @return \Illuminate\Http\Response
     */
    public function show(Kuisoner $kuisoner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kuisoner  $kuisoner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kuisoner['kuisoner'] = Kuisoner::findOrFail($id);

        return view('admin.dashboard.kuisoner.edit', $kuisoner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kuisoner  $kuisoner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kuisoner = Kuisoner::findOrFail($id);
        $kuisoner->update([
            'pertanyaan' => $request->pertanyaan,
            'status_pertanyaan' => $request->status_pertanyaan,
        ]);

        return redirect()->back()->with("OK", "Berhasil diubah.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kuisoner  $kuisoner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kuisoner $kuisoner)
    {
        //
    }
}
