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
       <div class="row text-center my-4 d-flex justify-content-between">
          <div class="col-lg-4 bg-white rounded-3 shadow-sm py-3" style="border-left: 2em solid rgb(13, 202, 240)">
            <a href="/surat-masuk" class="text-decoration-none text-black">
               <h5 class="text-info">Surat Masuk</h5>
               <div class="row fs-1">
                  <div class="col-6 text-end">
                     <span>4</span>
                  </div>
                  <div class="col-6 text-start">
                     <span><i class="bi bi-file-earmark-arrow-down"></i></span>
                  </div>
               </div>
            </a>
          </div>
          <div class="col-lg-4 bg-white rounded-3 shadow-sm py-3" style="border-left: 2em solid rgb(255,193,7)">
            <a href="/surat-keluar" class="text-decoration-none text-black">
               <h5 class="text-warning">Surat Keluar</h5>
               <div class="row fs-1">
                  <div class="col-6 text-end">
                     <span>5</span>
                  </div>
                  <div class="col-6 text-start">
                     <span><i class="bi bi-file-earmark-arrow-up"></i></span>
                  </div>
               </div>
            </a> 
            </div>
          <div class="col-lg-4 bg-white rounded-3 shadow-sm py-3" style="border-left: 2em solid rgb(25,135,84)">
            <a href="/lainnya" class="text-decoration-none text-black">
               
               <h5 class="text-success">Dokumen Lainnya</h5>
               <div class="row fs-1">
                  <div class="col-6 text-end">
                     <span>7</span>
                  </div>
                  <div class="col-6 text-start">
                     <span><i class="bi bi-file-earmark"></i></span>
                  </div>
            </div>
            </a> 
          </div>
       </div>
       @if (auth()->user()->jabatan !== 'Sekretaris')
       @else
       <div class="row text-center my-4 d-flex justify-content-between">
         <div class="col-lg-4">
            <a href="/surat-masuk/create" class="btn btn-info text-white m-3"><i class="bi bi-envelope-plus"></i> Tambah Surat Masuk</a>
         </div>
         <div class="col-lg-4">
            <a href="/surat-keluar/create" class="btn btn-warning text-white m-3"><i class="bi bi-envelope-plus"></i> Tambah Surat Keluar</a>
         </div>
         <div class="col-lg-4">
            <a href="/lainnya/create" class="btn btn-success text-white m-3"><i class="bi bi-envelope-plus"></i> Tambah Dokumen Lainnya</a>
         </div>
       </div>
       @endif
       
    </div>
@endsection