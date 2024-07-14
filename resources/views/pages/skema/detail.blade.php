@extends('templates.main')
@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
       <div class="col-sm-12">
          <div class="card">
             <div class="card-header d-flex justify-content-between">
                <div class="header-title d-flex justify-content-between w-100">

                  <p>
                     {{ $schema->judul_unit }}
                  </p>

                  <button type="button" class="btn btn-outline-primary me-4">
                     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-sliders" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1z"/>
                      </svg>
                  </button>

                </div>
             </div>
             <div class="card-body">

                <table class="table table-striped">
                    <thead>
                        <th>Kode Unit</th>
                        <th>Unit Kompetensi</th>
                    </thead>
                    <tbody>
                        @foreach (json_decode($schema->elemen_kompetensi) as $key => $row)
                            <tr>
                                <td>{{ $row->kode_unit }}</td>
                                <td>{{ $row->kuk }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

             </div>
          </div>
       </div>
    </div>
</div>

@endsection
