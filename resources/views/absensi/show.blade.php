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
         <div class="col-md-12">
            <form action="/absensi" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="form-control" id="user_id" name="user_id" value="{{ auth()->user()->id }}" readonly>
            <div class="mb-3">
               <label for="nama" class="form-label"><i class="bi bi-list-ul"></i> Nama Kegiatan</label>
               <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" required value="{{ old('nama') }}">
               @error('nama')
                  <div class="invalid-feedback">
                     {{ $message }}
                  </div>
               @enderror
            </div>
            <div class="mb-3">
               <label for="tanggal" class="form-label"><i class="bi bi-calendar-minus"></i> Tanggal</label>
               <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" required value="{{ old('tanggal') }}">
               @error('tanggal')
                  <div class="invalid-feedback">
                     {{ $message }}
                  </div>
               @enderror
            </div>
         </div>
         {{-- <div class="row bg-white mt-4 pt-3 p-1 rounded-3 shadow-sm">
            <div class="row mb-3">
               <div class="col-lg-2">
                  <label for="nama" class="form-label"><i class="bi bi-text-left"></i> Nama Kegiatan</label>
               </div>
               <div class="col-lg-10">
                  <input type="text" class="form-control" id="nama" name="nama" >
               </div>
            </div>
            <div class="row mb-3">
               <div class="col-lg-2">
                  <label for="tanggal" class="form-label"><i class="bi bi-calendar-minus"></i> Tanggal</label>
               </div>
               <div class="col-lg-10">
                  <input type="date" class="form-control" id="tanggal" name="tanggal" >
               </div>
            </div>
         </div> --}}
      
         {{-- <div class="row bg-white mt-4 pt-3 p-1 rounded-3 shadow-sm">
            <div class="table-responsive my-3 bg-white text-center">
               <table class="table table-striped table-sm">
               <thead>
                  <tr>
                     <th scope="col">Nama Kegiatan</th>
                     <th scope="col">Tanggal</th>
                     <th scope="col">Jumlah Hadir</th>
                     <th scope="col">Jumlah Tidak Hadir</th>
                     <th scope="col">Keterangan</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td><input type="text" class="form-control" id="nama" name="nama" ></td>
                     <td><input type="date" class="form-control" id="tanggal" name="tanggal" ></td>
                     <td><input type="number" class="form-control" id="Hadir" name="hadir" ></td>
                     <td><input type="number" class="form-control" id="tidak_hadir" name="tidak_hadir" ></td>
                     <td><input type="string" class="form-control" id="keteranganb" name="keteranganb" ></td>
                  </tr>
               </tbody>
               </table>
            </div>
         </div>
         <div class="d-flex justify-content-end mt-3">
            <button type="submit" class="btn btn-info text-white">Submit</button>
          </div> --}}
      </div>
      <div class="row bg-white mt-4 pt-3 p-1 rounded-3 shadow-sm">
         <div class="col-md-12">
            <table class="table table-striped table-bordered" readonly>
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Nama</th>
                     <th>Jabatan</th>
                     <th class="text-center">Hadir</th>
                     <th class="text-center">Tidak Hadir</th>
                     <th class="text-center">Keterangan</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td>1</td>
                     <td>Singgih</td>
                     <td>Ketua</td>
                     <td class="text-center"><input type="checkbox" name="hadir"></td>
                     <td class="text-center"><input type="checkbox" name="tidak_hadir"></td>
                     <td class="text-center">
                        <select name="keterangan" class="form-control">
                           <option value="-">-</option>
                           <option value="Sakit">Sakit</option>
                           <option value="Izin">Izin</option>
                        </select>
                     </td>
                  </tr>
                  <tr>
                     <td>2</td>
                     <td>Febri</td>
                     <td>Wakil Ketua</td>
                     <td class="text-center"><input type="checkbox" name="hadir"></td>
                     <td class="text-center"><input type="checkbox" name="tidak_hadir"></td>
                     <td class="text-center">
                        <select name="keterangan" class="form-control">
                           <option value="-">-</option>
                           <option value="Sakit">Sakit</option>
                           <option value="Izin">Izin</option>
                        </select>
                     </td>
                  </tr>
                  <tr>
                     <td>3</td>
                     <td>Eulis</td>
                     <td>Sekretaris</td>
                     <td class="text-center"><input type="checkbox" name="hadir"></td>
                     <td class="text-center"><input type="checkbox" name="tidak_hadir"></td>
                     <td class="text-center">
                        <select name="keterangan" class="form-control">
                           <option value="-">-</option>
                           <option value="Sakit">Sakit</option>
                           <option value="Izin">Izin</option>
                        </select>
                     </td>
                  </tr>
                  <tr>
                     <td>4</td>
                     <td>Prita</td>
                     <td>Sekretaris</td>
                     <td class="text-center"><input type="checkbox" name="hadir"></td>
                     <td class="text-center"><input type="checkbox" name="tidak_hadir"></td>
                     <td class="text-center">
                        <select name="keterangan" class="form-control">
                           <option value="-">-</option>
                           <option value="Sakit">Sakit</option>
                           <option value="Izin">Izin</option>
                        </select>
                     </td>
                  </tr>
               </tbody>
            </table>
            <div class="d-flex justify-content-end">
               <button type="submit" class="btn btn-info">Submit</button>
            </div>
         </form>
         </div>
      </div>
    </div>
@endsection