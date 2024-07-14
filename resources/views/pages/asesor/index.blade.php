@extends('templates.main')
@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
       <div class="col-sm-12">
          <div class="card">
             <div class="card-header d-flex justify-content-between">
                <div class="header-title">


                   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                     + Tambah Data Asesor
                  </button>

                  <!-- Modal -->

                  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h1 class="modal-title fs-5" id="addModalLabel">Fill Form Below</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <div class="modal-body">
                            <form class="rounded mx-3 mb-3" action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data" id="addAsesor">
                                @csrf
                                <div class="row">
                                  <div class="col-md-6 mb-3">
                                     <label class="form-label" for="validationDefault01">Nama</label>
                                     <input type="text" name="nama" class="form-control bg-white @error('nama') is-invalid @enderror" id="validationDefault01" required>
                                  </div>
                                  @error('nama')
                                     <div class="invalid-feedback">
                                        {{ $message }}
                                     </div>
                                  @enderror
                                  <div class="col-md-6 mb-3">
                                     <label class="form-label" for="validationDefault02">Username</label>
                                     <input type="text" value="{{ old('username') }}" name="username" class="form-control bg-white @error('username') is-invalid @enderror" id="validationDefault02" required>
                                  </div>
                                  <div class="col-md-6 mb-3">
                                     <label for="validationCustomUsername" class="form-label">Password</label>
                                     <div class="form-group">
                                        <input type="text" value="{{ old('password') }}" name="password" class="form-control bg-white @error('password') is-invalid @enderror" id="validationCustomUsername" aria-label="Username" aria-describedby="basic-addon1" required>
                                     </div>
                                  </div>
                                  <div class="col-md-6 mb-3">
                                      <label for="validationCustomUsername" class="form-label">No Registrasi</label>
                                      <div class="form-group">
                                         <input type="text" value="{{ old('no_registrasi') }}" name="no_registrasi" class="form-control bg-white @error('no_registrasi') is-invalid @enderror" id="validationCustomUsername" aria-label="Username" aria-describedby="basic-addon1" required>
                                      </div>
                                   </div>
                                   <div class="col-md-6 mb-3">
                                      <label for="validationCustomUsername" class="form-label">Asal Sekolah</label>
                                      <div class="form-group">
                                         <input type="text" value="{{ old('sekolah') }}" name="sekolah" class="form-control bg-white @error('sekolah') is-invalid @enderror" id="validationCustomUsername" aria-label="Username" aria-describedby="basic-addon1" required>
                                      </div>
                                   </div>
                                   <div class="col-md-6 mb-3">
                                      <label for="validationCustomUsername" class="form-label">Kompetensi</label>
                                      <div class="form-group">
                                         <input type="text" value="{{ old('kompetensi') }}" name="kompetensi" class="form-control bg-white @error('kompetensi') is-invalid @enderror" id="validationCustomUsername" aria-label="Username" aria-describedby="basic-addon1" required>
                                      </div>
                                   </div>
                                   <div class="col-md-6 mb-3">
                                      <label for="validationCustomUsername" class="form-label">Masa Berlaku s/d</label>
                                      <div class="form-group">
                                         <input type="date" value="{{ old('active') }}" name="active" class="form-control bg-white @error('active') is-invalid @enderror" id="validationCustomUsername" aria-label="Username" aria-describedby="basic-addon1" required>
                                      </div>
                                   </div>
                               </div>
                               <button type="submit" class="btn btn-primary my-3 w-100">Save</button>
                             </form>
                           </div>

                       </div>
                     </div>
                   </div>



                </div>
             </div>
             <div class="card-body">
                <div class="table-responsive">

                   <table id="datatable" class="table table-striped" data-toggle="data-table">
                      <thead>
                         <tr>
                           <th>No</th>
                           <th>Nama</th>
                            <th>No Registrasi</th>
                            <th>Asal Sekolah</th>
                            <th>Kompetensi</th>
                            <th>Masa Berlaku</th>
                            <th>Aksi</th>
                         </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->nama }}</td>
                            @foreach (json_decode($row->profil) as $item)
                                <td>{{ $item }}</td>
                            @endforeach
                            <td>
                                <form action="{{ route('users.destroy', $row->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure about that?')">DEL</button>
                                </form>
                                <a class="btn btn-warning" href="{{ route('users.edit', $row->id) }}">EDIT</a>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                   </table>

                </div>
             </div>
          </div>
       </div>
    </div>
</div>

@endsection
