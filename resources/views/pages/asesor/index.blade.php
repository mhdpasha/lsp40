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
                  @csrf
                  
                  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h1 class="modal-title fs-5" id="addModalLabel">Drag CSV Below</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                           </div>
                           <form class="dropzone rounded mx-3 mb-3 mt-4 py-5" action="{{ route('asesi.store') }}" method="POST" enctype="multipart/form-data" id="addForm">
                              @csrf
                           </form>
                        <button type="button" class="btn btn-primary mx-5 my-3" id="submitBtn">Save</button>

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
                           <th>Umur</th>
                           <th>Jurusan</th>
                           <th>Tanggal Lahir</th>
                           <th>Username</th>
                         </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->nama }}</td>
                            <td>{{ $user->umur }}</td>
                            <td>{{ $user->jurusan }}</td>
                            <td>{{ $user->tanggallahir }}</td>
                            <td>{{ $user->username }}</td>
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

<script src="../assets/js/dropzone.js"></script>
@endsection