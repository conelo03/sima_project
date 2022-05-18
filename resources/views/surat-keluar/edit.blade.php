@extends('layouts.dashboard')

@section('container')
    <div class="container">
       <div class="row bg-white mt-4 pt-3 p-1 rounded-3 shadow-sm">
         <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="/arsip">Arsip</a></li>
              <li class="breadcrumb-item"><a href="/surat-keluar">Surat Keluar</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
            </ol>
          </nav>
       </div>
       <div class="row bg-white mt-4 pt-3 p-1 rounded-3 shadow-sm">
        <form action="/surat-keluar/{{ $suratkeluar->id }}" method="POST" enctype="multipart/form-data">
         @method('put') 
         @csrf
          <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ auth()->user()->id }}" readonly>
          @if (auth()->user()->jabatan === 'Pembina')
            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                @if ($suratkeluar->status === 'Menunggu')
                <option value="Menunggu" selected>Menunggu</option>
                @else
                <option value="Menunggu">Menunggu</option>
                @endif

                @if ($suratkeluar->status === 'Disetujui')
                <option value="Disetujui" selected>Disetujui</option>
                @else
                <option value="Disetujui">Disetujui</option>
                @endif
                
                @if ($suratkeluar->status === 'Ditolak')
                <option value="Ditolak" selected>Ditolak</option>
                @else
                <option value="Ditolak">Ditolak</option>
                @endif
                
              </select>
              @error('jabatan')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="komentar" class="form-label">Komentar</label>
              <textarea class="form-control" id="komentar" name="komentar" rows="3">{{ $suratkeluar->komentar }}</textarea>
              @error('komentar')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
          </div>
          @endif
          <div class="mb-3">
            <label for="nomor_surat" class="form-label"><i class="bi bi-list-ul"></i> Nomor Surat</label>
            <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror" id="nomor_surat" name="nomor_surat" required value="{{ old('nomor_surat', $suratkeluar->nomor_surat) }}">
            @error('nomor_surat')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
          </div>
          <div class="mb-3">
            <label for="tanggal" class="form-label"><i class="bi bi-calendar-minus"></i> Tanggal</label>
            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" required value="{{ old('tanggal', $suratkeluar->tanggal) }}">
            @error('tanggal')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
          </div>
          <div class="mb-3">
            <label for="tujuan_surat" class="form-label"><i class="bi bi-people"></i> Tujuan Surat </label>
            <input type="text" class="form-control @error('tujuan_surat') is-invalid @enderror" id="tujuan_surat" name="tujuan_surat" required value="{{ old('tujuan_surat', $suratkeluar->tujuan_surat) }}">
            @error('tujuan_surat')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
          </div>
          <div class="mb-3">
            <label for="perihal" class="form-label"><i class="bi bi-justify-left"></i>Perihal</label>
            <input type="text" class="form-control @error('perihal') is-invalid @enderror" id="perihal" name="perihal" required value="{{ old('perihal', $suratkeluar->perihal) }}">
            @error('perihal')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
         </div>
         <div class="mb-3">
          <label for="isi" class="form-label"><i class="bi bi-file-earmark-font"></i> Isi</label>
          <textarea class="form-control @error('isi') is-invalid @enderror" name="isi" id="surat_keluar" rows="3" required>{{ old('isi', $suratkeluar->isi) }}</textarea>
          {{-- <input type="text" class="form-control @error('isi') is-invalid @enderror" id="isi" name="isi" required value="{{ old('isi', $suratkeluar->isi) }}"> --}}
          @error('isi')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
        </div>
         <div class="mb-3">
          <label for="berkas" class="form-label"> Berkas</label>
          <input class="form-control @error('berkas') is-invalid @enderror" type="file" id="berkas" name="berkas">
          @error('berkas')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
          @enderror
          </div>
        </div>
        <i>*Surat keluar akan diteruskan ke Pembina untuk meminta persetujuan</i>
        <div class="d-flex justify-content-end mb-5">
          <a href="/surat-keluar" class="btn btn-secondary mx-4">Cancel</a>
          <button type="submit" class="btn btn-info">Save</button>
        </div>
      </form>
      </div>
@endsection