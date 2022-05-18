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
       @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
       @endif
       <div class="d-flex justify-content-start mt-5">
          <a href="/user/create" class="btn btn-info text-white"><i class="bi bi-plus-circle"></i> Tambah Data</a>
       </div>
       <div class="table-responsive my-3 bg-white text-center">
         <table class="table table-striped table-sm">
           <thead>
             <tr>
               <th scope="col">#</th>
               <th scope="col">Name</th>
               <th scope="col">Email</th>
               <th scope="col">Jabatan</th>
               <th scope="col">Angkatan</th>
               <th scope="col">Status</th>
               <th scope="col">Action</th>
             </tr>
           </thead>
           <tbody>
             @foreach ($users as $user)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->jabatan }}</td>
                <td>{{ $user->angkatan }}</td>
                <td>{{ $user->status }}</td>
                <td>
                    <a href="/user/{{ $user->username }}" class="btn btn-success"><i class="bi bi-eye"></i></a>
                    <a href="/user/{{ $user->username }}/edit" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                    <form action="/user/{{ $user->username }}" method="post" class="d-inline">
                      @method('delete')
                      @csrf
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus Data?')"><i class="bi bi-trash"></i></button>
                    </form>
                  </td>
              </tr>
             @endforeach
           </tbody>
         </table>
       </div>
       <div class="d-flex justify-content-end">
         {{ $users->links() }}
       </div>
      </div>
@endsection