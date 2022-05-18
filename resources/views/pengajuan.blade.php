@extends('layouts.dashboard')

@section('container')
    <div class="container">
        <div class="row bg-white mt-4 pt-3 p-1 rounded-3 shadow-sm">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
                </ol>
            </nav>
        </div>
        <div class="row bg-white mt-4 pt-3 p-1 rounded-3 shadow-sm">
            <form action="/surat-keluar" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ auth()->user()->id }}"
                    readonly>
                <div class="mb-3">
                    <label for="nomor_surat" class="form-label"><i class="bi bi-list-ul"></i> Nomor Surat</label>
                    <input type="text" class="form-control @error('nomor_surat') is-invalid @enderror" id="nomor_surat"
                        name="nomor_surat" value="{{ old('nomor_surat') }}" required>
                    @error('nomor_surat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tanggal" class="form-label"><i class="bi bi-calendar-minus"></i> Tanggal</label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                        name="tanggal" value="{{ old('tanggal') }}" required>
                    @error('tanggal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tujuan_surat" class="form-label"><i class="bi bi-people"></i> Tujuan Surat </label>
                    <input type="text" class="form-control @error('tujuan_surat') is-invalid @enderror" id="tujuan_surat"
                        name="tujuan_surat" value="{{ old('tujuan_surat') }}" required>
                    @error('tujuan_surat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="perihal" class="form-label"><i class="bi bi-justify-left"></i>Perihal</label>
                    <input type="text" class="form-control @error('perihal') is-invalid @enderror" id="perihal"
                        name="perihal" value="{{ old('perihal') }}" required>
                    @error('perihal')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- <div class="mb-3">
                    <label for="isi" class="form-label"><i class="bi bi-file-earmark-font"></i> Isi</label>
                    <input type="text" class="form-control @error('isi') is-invalid @enderror" id="isi" name="isi"
                        value="{{ old('isi') }}" required>
                    @error('isi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div> --}}
                <div class="mb-3">
                    <label for="isi" class="form-label"><i class="bi bi-file-earmark-font"></i> Isi</label>
                    <textarea class="form-control @error('isi') is-invalid @enderror" name="isi" id="surat_keluar" rows="3"
                        required>{{ old('isi') }}</textarea>
                    {{-- <input type="text" class="form-control " id="isi" name="isi" " required> --}}
                    @error('isi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="berkas" class="form-label"> Berkas</label>
                    <input class="form-control @error('berkas') is-invalid @enderror" type="file" id="berkas" name="berkas"
                        required>
                    @error('berkas')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="d-flex justify-content-end">
                    <a href="/home" class="btn btn-danger mx-4">Cancel</a>
                    <button type="submit" class="btn btn-info">SEND</button>
                </div>
            </form>
        </div>
        <i>*Pengajuan surat akan diteruskan ke Sekretaris untuk ditindak lanjuti</i>
    </div>
@endsection
