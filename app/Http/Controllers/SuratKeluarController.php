<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('surat-keluar.index', [
            'title' => 'Surat Keluar',
            'suratkeluar' => SuratKeluar::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('surat-keluar.create', [
            'title' => 'Tambah Surat Keluar'
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
            'status' => 'nullable',
            'komentar' => 'nullable',
            'nomor_surat' => 'required',
            'tanggal' => 'required',
            'tujuan_surat' => 'required',
            'perihal' => 'required',
            'isi' => 'required',
            'berkas' => 'nullable|file|max:16384'
        ]);

        if ($request->file('berkas')) {
            $validatedData['berkas'] = $request->file('berkas')->store('surat-keluar');
        }

        SuratKeluar::create($validatedData);

        return redirect('/surat-keluar')->with('success', 'Data berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SuratKeluar  $suratKeluar
     * @return \Illuminate\Http\Response
     */
    public function show(SuratKeluar $suratKeluar)
    {
        return view('surat-keluar.show', [
            'title' => 'Surat Keluar',
            'suratkeluar' => $suratKeluar
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SuratKeluar  $suratKeluar
     * @return \Illuminate\Http\Response
     */
    public function edit(SuratKeluar $suratKeluar)
    {
        return view('surat-keluar.edit', [
            'title' => 'Ubah Surat Keluar',
            'suratkeluar' => $suratKeluar
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SuratKeluar  $suratKeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuratKeluar $suratKeluar)
    {
        $rules = [
            'user_id' => 'required',
            'status' => 'nullable',
            'komentar' => 'nullable',
            'nomor_surat' => 'required',
            'tanggal' => 'required',
            'tujuan_surat' => 'required',
            'perihal' => 'required',
            'isi' => 'required',
            'berkas' => 'nullable|file|max:16384'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('berkas')) {
            if ($request->oldBerkas) {
                Storage::delete($request->oldBerkas);
            }
            $validatedData['berkas'] = $request->file('berkas')->store('surat-keluar');
        }

        SuratKeluar::where('id', $suratKeluar->id)->update($validatedData);

        return redirect('/surat-keluar')->with('success', 'Data Surat Keluar berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SuratKeluar  $suratKeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuratKeluar $suratKeluar)
    {
        if ($suratKeluar->berkas) {
            Storage::delete($suratKeluar->berkas);
        }
        SuratKeluar::destroy($suratKeluar->id);
        return redirect('/surat-keluar')->with('success', 'Data Akun telah dihapus');
    }
}
