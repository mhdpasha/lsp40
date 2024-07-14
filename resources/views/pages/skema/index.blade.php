@extends('templates.main')
@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
       <div class="col-sm-12">
          <div class="card">
             <div class="card-header d-flex justify-content-between">
                <div class="header-title d-flex justify-content-between w-100">

                  <a href="{{ route('schema.create') }}" class="btn btn-primary">
                     + Tambah Data Skema
                  </a>

                  <button type="button" class="btn btn-outline-primary me-4">
                     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-sliders" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1z"/>
                      </svg>
                  </button>

                </div>
             </div>
             <div class="card-body">
                <div class="table-responsive">

                   <table id="datatable" class="table table-striped" data-toggle="data-table">
                      <thead>
                         <tr>
                            <th>No.</th>
                            <th>Skema Sertifikasi</th>
                            <th>Jumlah Unit</th>
                            <th>Jenis</th>
                            <th>Aksi</th>
                         </tr>
                      </thead>
                      <tbody>
                        @foreach ($schemes as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><a href="{{ route('schema.show', $row->id) }}">{{ $row->judul_unit }}</a></td>
                            <td>{{ count(json_decode($row->elemen_kompetensi, true)) }}</td>
                            <td>Klaster</td>
                            <td>
                                <form action="{{ route('schema.destroy', $row->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure about that?')">Hapus</button>
                                </form>
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
