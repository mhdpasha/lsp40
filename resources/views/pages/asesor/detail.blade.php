@extends('templates.main')
@section('content')
<style>

    .pdf-wrap{
        border: 1px solid #111; 
        width: 800px;
    }
    .pdf-head{
        width: 90%;
    }

    .pdf-head td{
        padding: 5px 3px;
        border: 1px solid #111;
        color: #111;
        font-size: 13px;
        font-weight: 500
    }

    .pdf-head .head{
        text-align: center;
        font-weight: bold
    }

    .pdf-body{
        width: 90%;
        border-collapse: separate; /* Prevents cells from collapsing together */
        border-spacing: 15px 20px; /* Sets the space between cells */
    }

    .pdf-body td{
        color: #111;
        font-size: 13px;
        font-weight: 500
    }

    .pdf-body td:nth-child(3) {
        border-bottom: 2px dotted black; /* Apply the dotted underline */
    }

    .pdf-body td:nth-child(2) {
        width: 1%;
    }
    
    .pdf-body td:first-child{
        width: 25%;
    }
</style>
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
       <div class="col-sm-12">
          <div class="card">
             <div class="card-header d-flex justify-content-between">
                <div class="header-title d-flex justify-content-between w-100">

                  <p>
                     Data Asesor
                  </p>

                  <button type="button" class="btn btn-outline-primary me-4">
                     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-sliders" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1z"/>
                      </svg>
                  </button>

                </div>
             </div>
             <div class="card-body d-flex justify-content-center">

                <div class="p-5 pdf-wrap">
                    <div class="d-flex justify-content-center">
                        <table class="pdf-head center">
                            <tr>
                                <td rowspan="3" style="width: 20%"><img src="{{ asset('images/lsp-logo.jpg') }}" alt="" width="100%"></td>
                                <td colspan="3" class="head" style="font-size: 18px">LSP SMKN 40 JAKARTA</td>
                            </tr>
                            <tr>
                                <td rowspan="2" class="head" style="background-color: #A8D08D;">FORMULIR</td>
                                <td style="width:19%;">No. Dokumen</td>
                                <td>024/B/LSPSMKN40JKT/I/2024</td>
                            </tr>
                            <tr>
                                <td>Edisi/Revisi</td>
                                <td>01/00</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="head">BIODATA ASESOR</td>
                                <td>Tanggal Berlaku</td>
                                <td>1 Maret 2021</td>
                            </tr>
                        </table>
                    </div>
                    <div class="d-flex flex-column align-items-center justify-content-center mt-4">
                        <h5 class="fw-bold">BIODATA ASESOR</h5>
                        <table class="pdf-body mt-5">
                            <tr>
                                <td>Nama Asesor</td>
                                <td>:</td>
                                <td>{{ $user->nama }}</td>
                            </tr>
                            <tr>
                                <td>Tempat / Tgl. Lahir </td>
                                <td>:</td>
                                <td>{{ json_decode($user->profil)->no_registrasi }}</td>
                            </tr>
                            <tr>
                                <td>No. Reg. MET</td>
                                <td>:</td>
                                <td>{{ json_decode($user->profil)->no_registrasi }}</td>
                            </tr>
                            <tr>
                                <td>Kompetensi Keahlian </td>
                                <td>:</td>
                                <td>{{ json_decode($user->profil)->kompetensi }}</td>
                            </tr>
                            <tr>
                                <td>Asal LSP </td>
                                <td>:</td>
                                <td>{{ json_decode($user->profil)->sekolah }}</td>
                            </tr>
                            <tr>
                                <td>Alamat Rumah </td>
                                <td>:</td>
                                <td>{{ json_decode($user->profil)->alamat }}</td>
                            </tr>
                            <tr>
                                <td>NPWP</td>
                                <td>:</td>
                                <td>{{ json_decode($user->profil)->NPWP }}</td>
                            </tr>
                            <tr>
                                <td>No.Rekening </td>
                                <td>:</td>
                                <td>{{ json_decode($user->profil)->norek }}</td>
                            </tr>
                            <tr>
                                <td>No. HP</td>
                                <td>:</td>
                                <td>{{ json_decode($user->profil)->no_hp }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="d-flex flex-column align-items-end justify-content-end mt-4 py-4" style="width: 95%; color: #111;
        font-size: 13px; font-weight: 500">
                        <p>Jakarta, ...............................
                        </p>
                        <p class="mb-5">Asesor</p>
                        <p class="mt-5">{{ $user->nama }}</p>
                    </div>
                </div>

             </div>
          </div>
       </div>
    </div>
</div>
@endsection
