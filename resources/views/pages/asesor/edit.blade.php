@extends('templates.main')
@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
       <div class="col-sm-12">
          <div class="card">
             <div class="card-header d-flex justify-content-between">
                <div class="header-title d-flex justify-content-between w-100">

                  <p>
                     Edit Data Asesor
                  </p>

                  <button type="button" class="btn btn-outline-primary me-4">
                     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-sliders" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1z"/>
                      </svg>
                  </button>

                </div>
             </div>
             <div class="card-body">

                <form class="rounded mx-3 mb-3" action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data" id="addAsesor">
                    @csrf
                    <div class="row" id="rowForm">
                     <div class="col-md-6 mb-3">
                        <label class="form-label" for="validationDefault01">Nama</label>
                        <input type="text" name="nama" value="{{ $user->nama }}" class="form-control bg-white @error('nama') is-invalid @enderror" id="validationDefault01" required>
                     </div>
                     @error('nama')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                     @enderror
                     <div class="col-md-6 mb-3">
                        <label class="form-label" for="validationDefault02">Username</label>
                        <input type="text" value="{{ $user->username }}" name="username" class="form-control bg-white @error('username') is-invalid @enderror" id="validationDefault02" required>
                     </div>
                     <div class="col-md-6 mb-3">
                        <label for="validationCustomUsername" class="form-label">Password</label>
                        <div class="form-group">
                           <input type="text" name="password" class="form-control bg-white @error('password') is-invalid @enderror" id="validationCustomUsername" aria-label="Username" aria-describedby="basic-addon1" required>
                        </div>
                     </div>
                     <div class="col-md-6 mb-3">
                         <label for="validationCustomUsername" class="form-label">No Registrasi</label>
                         <div class="form-group">
                            <input type="text" value="{{ json_decode($user->profil)->no_registrasi }}" name="no_registrasi" class="form-control bg-white @error('no_registrasi') is-invalid @enderror" id="validationCustomUsername" aria-label="Username" aria-describedby="basic-addon1" required>
                         </div>
                      </div>
                      <div class="col-md-6 mb-3">
                         <label for="validationCustomUsername" class="form-label">Asal Sekolah</label>
                         <div class="form-group">
                            <input type="text" value="{{ json_decode($user->profil)->sekolah }}" name="sekolah" class="form-control bg-white @error('sekolah') is-invalid @enderror" id="validationCustomUsername" aria-label="Username" aria-describedby="basic-addon1" required>
                         </div>
                      </div>
                      <div class="col-md-6 mb-3">
                         <label for="validationCustomUsername" class="form-label">Kompetensi</label>
                         <div class="form-group">
                            <input type="text" value="{{ json_decode($user->profil)->kompetensi }}" name="kompetensi" class="form-control bg-white @error('kompetensi') is-invalid @enderror" id="validationCustomUsername" aria-label="Username" aria-describedby="basic-addon1" required>
                         </div>
                      </div>
                      <div class="col-md-6 mb-3">
                       <label for="validationCustomUsername" class="form-label">Alamat</label>
                       <div class="form-group">
                          <input type="text" value="{{ json_decode($user->profil)->alamat }}" name="alamat" class="form-control bg-white @error('alamat') is-invalid @enderror" id="validationCustomUsername" aria-label="Username" aria-describedby="basic-addon1" required>
                       </div>
                    </div>
                    <div class="col-md-6 mb-3">
                       <label for="validationCustomUsername" class="form-label">NPWP</label>
                       <div class="form-group">
                          <input type="text" value="{{ json_decode($user->profil)->NPWP }}" name="NPWP" class="form-control bg-white @error('NPWP') is-invalid @enderror" id="validationCustomUsername" aria-label="Username" aria-describedby="basic-addon1" required>
                       </div>
                    </div>
                    <div class="col-md-6 mb-3">
                       <label for="validationCustomUsername" class="form-label">No. Rekening</label>
                       <div class="form-group">
                          <input type="text" value="{{ json_decode($user->profil)->norek }}" name="norek" class="form-control bg-white @error('norek') is-invalid @enderror" id="validationCustomUsername" aria-label="Username" aria-describedby="basic-addon1" required>
                       </div>
                    </div>
                    <div class="col-md-6 mb-3">
                       <label for="validationCustomUsername" class="form-label">No. Hp</label>
                       <div class="form-group">
                          <input type="text" value="{{ json_decode($user->profil)->no_hp }}" name="no_hp" class="form-control bg-white @error('no_hp') is-invalid @enderror" id="validationCustomUsername" aria-label="Username" aria-describedby="basic-addon1" required>
                       </div>
                    </div>
                      <div class="col-md-6 mb-3">
                         <label for="validationCustomUsername" class="form-label">Masa Berlaku s/d</label>
                         <div class="form-group">
                            <input type="date" value="{{ json_decode($user->profil)->active }}" name="active" class="form-control bg-white @error('active') is-invalid @enderror" id="validationCustomUsername" aria-label="Username" aria-describedby="basic-addon1" required>
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
@endsection
