<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('absensi.index', [
            'title' => 'Absensi',
            'absensi' => Absensi::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('absensi.create', [
            'title' => 'Tambah Absensi'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'nama' => 'required',
            'tanggal' => 'required',
            'hadir' => 'required',
            'tidak_hadir' => 'required',
            'keterangan' => 'nullable|required',
        ]);

        Absensi::create($validatedData);

        return redirect('/absensi')->with('success', 'Data berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function show(Absensi $absensi)
    {
        return view('absensi.show', [
            'title' => 'Absensi',
            'absensi' => $absensi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function edit(Absensi $absensi)
    {
        return view('absensi.edit', [
            'title' => 'Ubah Absensi',
            'absensi' => $absensi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absensi $absensi)
    {
        $rules = [
            'user_id' => 'required',
            'nama' => 'required',
            'tanggal' => 'required',
            'hadir' => 'required',
            'tidak_hadir' => 'required',
            'keterangan' => 'nullable',
        ];

        $validatedData = $request->validate($rules);

        Absensi::where('id', $absensi->id)->update($validatedData);

        return redirect('/absensi')->with('success', 'Data Absensi berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absensi  $absensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absensi $absensi)
    {
        Absensi::destroy($absensi->id);
        return redirect('/absensi')->with('success', 'Data Absensi telah dihapus');
    }
}
