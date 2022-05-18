<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DokumenLainnya;
use Illuminate\Support\Facades\Storage;

class DokumenLainnyaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dokumen-lainnya.index', [
            'title' => 'Dokumen Lainnya',
            'dokumen' => DokumenLainnya::paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dokumen-lainnya.create', [
            'title' => 'Tambah Dokumen Lainnya'
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
            'berkas' => 'nullable|file|max:16384'
        ]);

        if ($request->file('berkas')) {
            $validatedData['berkas'] = $request->file('berkas')->store('dokumen-lainnya');
        }

        DokumenLainnya::create($validatedData);

        return redirect('/lainnya')->with('success', 'Data berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DokumenLainnya  $dokumenLainnya
     * @return \Illuminate\Http\Response
     */
    public function show(DokumenLainnya $dokumenLainnya)
    {
        return view('dokumen-lainnya.show', [
            'title' => 'Dokumen Lainnya',
            'dokumen' => $dokumenLainnya
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DokumenLainnya  $dokumenLainnya
     * @return \Illuminate\Http\Response
     */
    public function edit(DokumenLainnya $dokumenLainnya)
    {
        return view('dokumen-lainnya.edit', [
            'title' => 'Ubah Dokumen Lainnya',
            'dokumen' => $dokumenLainnya
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DokumenLainnya  $dokumenLainnya
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DokumenLainnya $dokumenLainnya)
    {
        $rules = [
            'user_id' => 'required',
            'nama' => 'required',
            'berkas' => 'nullable|file|max:16384'
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('berkas')) {
            if ($request->oldBerkas) {
                Storage::delete($request->oldBerkas);
            }
            $validatedData['berkas'] = $request->file('berkas')->store('dokumen-lainnya');
        }

        DokumenLainnya::where('id', $dokumenLainnya->id)->update($validatedData);

        return redirect('/lainnya')->with('success', 'Data Dokunmen Lainnya berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DokumenLainnya  $dokumenLainnya
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dokumenLainnya = DokumenLainnya::find($id);
        if ($dokumenLainnya->berkas) {
            Storage::delete($dokumenLainnya->berkas);
        }
        DokumenLainnya::destroy($dokumenLainnya->id);
        return redirect('/lainnya')->with('success', 'Data Akun telah dihapus');
    }
}
