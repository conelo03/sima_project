<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('surat-masuk.index', [
            'title' => 'Surat Masuk',
            'suratmasuk' => SuratMasuk::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('surat-masuk.create', [
            'title' => 'Tambah Surat Masuk'
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
        // return $request;
        $validatedData = $request->validate([
            'user_id' => 'required',
            'nomor_surat' => 'required',
            'tanggal' => 'required',
            'asal_surat' => 'required',
            'perihal' => 'required',
            'berkas' => 'nullable|file|max:16384'
        ]);

        if ($request->file('berkas')) {
            $validatedData['berkas'] = $request->file('berkas')->store('surat-masuk');
        }

        SuratMasuk::create($validatedData);

        return redirect('/surat-masuk')->with('success', 'Data berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SuratMasuk  $suratMasuk
     * @return \Illuminate\Http\Response
     */
    public function show(SuratMasuk $suratMasuk)
    {
        // return $suratMasuk;
        return view('surat-masuk.show', [
            'title' => 'Surat Masuk',
            'suratmasuk' => $suratMasuk
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SuratMasuk  $suratMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit(SuratMasuk $suratMasuk)
    {
        return view('surat-masuk.edit', [
            'title' => 'Ubah Surat Masuk',
            'suratmasuk' => $suratMasuk
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SuratMasuk  $suratMasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuratMasuk $suratMasuk)
    {
        $rules = [
            'user_id' => 'required',
            'nomor_surat' => 'required',
            'tanggal' => 'required',
            'asal_surat' => 'required',
            'perihal' => 'required',
            'berkas' => 'nullable|file|max:16384'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('berkas')) {
            if ($request->oldBerkas) {
                Storage::delete($request->oldBerkas);
            }
            $validatedData['berkas'] = $request->file('berkas')->store('surat-masuk');
        }

        SuratMasuk::where('id', $suratMasuk->id)->update($validatedData);

        return redirect('/surat-masuk')->with('success', 'Data Surat Masuk berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SuratMasuk  $suratMasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuratMasuk $suratMasuk)
    {
        if ($suratMasuk->berkas) {
            Storage::delete($suratMasuk->berkas);
        }
        SuratMasuk::destroy($suratMasuk->id);
        return redirect('/surat-masuk')->with('success', 'Data Akun telah dihapus');
    }
}
