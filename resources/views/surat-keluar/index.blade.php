@extends('layouts.dashboard')

@section('container')
    <div class="container">
      <div class="row bg-white mt-4 pt-3 p-1 rounded-3 shadow-sm">
         <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="/arsip">Arsip</a></li>
              <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
            </ol>
         </nav>
      </div>
      @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
       @endif
       @if (auth()->user()->jabatan === 'Sekretaris')
         <a href="/surat-keluar/create" class="btn btn-info text-white m-3"><i class="bi bi-envelope-plus"></i> Tambah Data</a>
         @else
          <div class="my-5"></div>
       @endif
      <div class="table-responsive bg-white text-center">
         <table class="table table-striped table-sm">
           <thead>
             <tr>
               <th scope="col">#</th>
               <th scope="col">Nomor Surat</th>
               <th scope="col">Tanggal</th>
               <th scope="col">Tujuan</th>
               <th scope="col">Perihal</th>
               <th scope="col">Status</th>
               <th scope="col">Aksi</th>
             </tr>
           </thead>
           <tbody>
             @foreach ($suratkeluar as $surat)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $surat->nomor_surat }}</td>
                <td>{{ $surat->tanggal }}</td>
                <td>{{ $surat->tujuan_surat }}</td>
                <td>{{ $surat->perihal }}</td>
                <td>
                  <span class="badge @if ($surat->status === 'Disetujui') bg-success @elseif ($surat->status === 'Ditolak') bg-danger @else bg-secondary @endif">{{ $surat->status }}</span>
                </td>
                  <td>
                    @if (auth()->user()->jabatan === 'Pengurus' || auth()->user()->jabatan === 'Ketua')
                    <a href="/surat-keluar/{{ $surat->id }}" class="btn btn-success"><i class="bi bi-eye"></i></a>
                    @elseif (auth()->user()->jabatan === 'Pembina')
                    <a href="/surat-keluar/{{ $surat->id }}" class="btn btn-success"><i class="bi bi-eye"></i></a>
                    <a href="/surat-keluar/{{ $surat->id }}/edit" class="btn btn-secondary"><i class="bi bi-chat-dots"></i></a>
                    @else
                    <a href="/surat-keluar/{{ $surat->id }}" class="btn btn-success"><i class="bi bi-eye"></i></a>
                    <a href="/surat-keluar/{{ $surat->id }}/edit" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                    <form action="/surat-keluar/{{ $surat->id }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus Data?')"><i class="bi bi-trash"></i></button>
                    </form>                  
                    @endif   
                  </td>
              </tr>
             @endforeach
             </tr>
           </tbody>
         </table>
       </div>
       <div class="d-flex justify-content-end">
        {{ $suratkeluar->links() }}
      </div>
      @if (auth()->user()->jabatan === 'Sekretaris')
      <div class="d-flex justify-content-end">
        <a href="/" class="btn btn-info text-white"><i class="bi bi-printer"></i> Cetak Rekap</a>
     </div>
     @endif
    </div>
@endsection