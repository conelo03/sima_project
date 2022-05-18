@extends('layouts.dashboard')

@section('container')
    <div class="container">
      <div class="row bg-white mt-4 pt-3 p-1 rounded-3 shadow-sm">
         <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="/absensi">Absensi</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
            </ol>
         </nav>
      </div>
      <div class="row bg-white mt-4 pt-3 p-1 rounded-3 shadow-sm">
      <form action="/absensi/{{ $absensi->id }}" method="POST" enctype="multipart/form-data">
         @method('put')
         @csrf
         <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ auth()->user()->id }}" readonly>
          <div class="mb-3">
            <label for="nama" class="form-label"><i class="bi bi-list-ul"></i> Nama Kegiatan</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required value="{{ old('nama', $absensi->nama) }}">
            @error('nama')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="tanggal" class="form-label"><i class="bi bi-calendar-minus"></i> Tanggal</label>
            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" required value="{{ old('tanggal', $absensi->tanggal) }}">
            @error('tanggal')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="hadir" class="form-label"><i class="bi bi-mailbox2"></i> Jumlah Hadir</label>
            <input type="number" class="form-control @error('hadir') is-invalid @enderror" id="hadir" name="hadir" required value="{{ old('hadir', $absensi->hadir) }}">
            @error('hadir')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
         </div>
          <div class="mb-3">
            <label for="tidak_hadir" class="form-label"><i class="bi bi-mailbox2"></i> Jumlah Tidak Hadir</label>
            <input type="number" class="form-control @error('tidak_hadir') is-invalid @enderror" id="tidak_hadir" name="tidak_hadir" required value="{{ old('tidak_hadir', $absensi->tidak_hadir) }}">
            @error('tidak_hadir')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
         </div>
          <div class="mb-3">
            <label for="keterangan" class="form-label"><i class="bi bi-mailbox2"></i> Keterangan</label>
            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" required value="{{ old('keterangan', $absensi->keterangan) }}">
            @error('keterangan')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
            @enderror
         </div>
          <div class="d-flex justify-content-end">
            <a href="/absensi" class="btn btn-secondary mx-4">Cancel</a>
            <button type="submit" class="btn btn-info">Save</button>
          </div>
         </form>
      </div>
    </div>
@endsection