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
                      <div class="col-md-12 mb-3">
                         <label class="form-label" for="validationDefault01">Judul</label>
                         <input type="text" name="judul" class="form-control bg-white @error('judul') is-invalid @enderror" id="validationDefault01" required>
                         @error('judul')
                            <div class="invalid-feedback">
                               {{ $message }}
                            </div>
                         @enderror
                      </div>
                      <div class="col-md-12 mb-3">
                        <label class="form-label" for="validationDefault01">TUK</label>
                        <input type="text" name="TUK" class="form-control bg-white @error('TUK') is-invalid @enderror" id="validationDefault01" required>
                        @error('TUK')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                      <div class="col-md-6 mb-3">
                        <label class="form-label" for="validationDefault01">Asesor</label>
                        <select name="asessor_id" id="" class="form-control bg-white @error('asessor_id') is-invalid @enderror">
                            <option selected disabled>Pilih</option>
                            @foreach ($asesor as $row)
                                <option value="{{ $row->id }}" {{ $row->id == old('asessor_id') ? 'selected' : '' }}>{{ $row->nama }} ({{ json_decode($row->profil)->no_registrasi}})</option>
                            @endforeach
                        </select>
                        @error('asessor_id')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                      </div>
                      <div class="col-md-6 mb-3">
                        <label class="form-label" for="validationDefault01">Skema Sertifikasi</label>
                        <select name="schema_id" id="" class="form-control bg-white @error('schema_id') is-invalid @enderror">
                            <option selected disabled>Pilih</option>
                            @foreach ($schemes as $row)
                                <option value="{{ $row->id }}" {{ $row->id == old('schema_id') ? 'selected' : '' }}>{{ $row->judul_unit }}</option>
                            @endforeach
                        </select>
                        @error('schema_id')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                      </div>
                      <div class="col-md-6 mb-3">
                        <label class="form-label" for="validationDefault01">Tanggal Mulai</label>
                        <input type="date" name="timeline_start" class="form-control bg-white @error('timeline_start') is-invalid @enderror" id="validationDefault01" value="{{ old('timeline_start') }}" required>
                        @error('timeline_start')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                     <div class="col-md-6 mb-3">
                        <label class="form-label" for="validationDefault01">Tanggal Berakhir</label>
                        <input type="date" name="timeline_end" class="form-control bg-white @error('timeline_end') is-invalid @enderror" id="validationDefault01" value="{{ old('timeline_end') }}" required>
                        @error('timeline_end')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
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
