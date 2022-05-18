@extends('layouts.dashboard')

@section('container')
    <div class="container">
        <div class="row bg-white mt-4 p-3 rounded-3 shadow-sm">
            <h5><i class="bi bi-info-circle"></i> Selamat datang di Sistem Informasi Manajemen Administrasi. Anda Login
                sebagai {{ auth()->user()->jabatan }}</h5>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row text-center my-4 d-flex justify-content-between">
            <div class="col-lg-3 bg-white rounded-3 shadow-sm py-3" style="border-left: 2em solid rgb(13, 202, 240)">
                <a href="/surat-masuk" class="text-decoration-none text-black">
                    <h5 class="text-info">Surat Masuk</h5>
                    <div class="row fs-1">
                        <div class="col-6 text-end">
                            <span>{{ $suratmasuk }}</span>
                        </div>
                        <div class="col-6 text-start">
                            <span><i class="bi bi-file-earmark-arrow-down"></i></span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 bg-white rounded-3 shadow-sm py-3" style="border-left: 2em solid rgb(255,193,7)">
                <a href="/surat-keluar" class="text-decoration-none text-black">
                    <h5 class="text-warning">Surat Keluar</h5>
                    <div class="row fs-1">
                        <div class="col-6 text-end">
                            <span>{{ $suratkeluar }}</span>
                        </div>
                        <div class="col-6 text-start">
                            <span><i class="bi bi-file-earmark-arrow-up"></i></span>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 bg-white rounded-3 shadow-sm py-3" style="border-left: 2em solid rgb(25,135,84)">
                <a href="/lainnya" class="text-decoration-none text-black">
                    <h5 class="text-success">Dokumen Lainnya</h5>
                    <div class="row fs-1">
                        <div class="col-6 text-end">
                            <span>{{ $dokumen }}</span>
                        </div>
                        <div class="col-6 text-start">
                            <span><i class="bi bi-file-earmark"></i></span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 bg-white rounded-3 shadow-sm py-3" style="border-left: 2em solid rgb(220,53,69)">
                <a href="/absensi" class="text-decoration-none text-black">
                    <h5 class="text-danger">Total Absensi</h5>
                    <div class="row fs-1">
                        <div class="col-6 text-end">
                            <span>{{ $absensi }}</span>
                        </div>
                        <div class="col-6 text-start">
                            <span><i class="bi bi-clipboard-check"></i></span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row text-center my-4">
            <div class="bg-white rounded-3 px-2 shadow-sm py-4" style="border-top: 2em solid rgb(13, 202, 240)">
                <h2 class="text-info text-left mb-5">Agenda</h2>
                <center>
                    <!-- THE CALENDAR -->
                    <div class="col-lg-8">
                        <div id="calendar"></div>
                    </div>
                </center>
            </div>
        </div>
        <div class="col-lg-4"></div>
    </div>
    </div>
@endsection
