@extends('templates.main')
@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div class="row">
       <div class="col-sm-12">
          <div class="card">
             <div class="card-header d-flex justify-content-between">
                <div class="header-title d-flex justify-content-between w-100">

                  <p>
                     Form
                  </p>

                  <button type="button" class="btn btn-outline-primary me-4">
                     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-sliders" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3M2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3m-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1z"/>
                      </svg>
                  </button>

                </div>
             </div>
             <div class="card-body">

                <form class="rounded mx-3 mb-3" action="{{ route('schema.store') }}" method="POST" enctype="multipart/form-data" id="addAsesor">
                    @csrf
                    <div class="row" id="rowForm">
                      <div class="col-md-12 mb-3">
                         <label class="form-label" for="validationDefault01">Judul Unit</label>
                         <input type="text" name="judul_unit" class="form-control bg-white @error('judul_unit') is-invalid @enderror" id="validationDefault01" required>
                      </div>
                      @error('judul_unit')
                         <div class="invalid-feedback">
                            {{ $message }}
                         </div>
                      @enderror
                      <div class="col-md-12 mb-3">
                         <label class="form-label" for="validationDefault02">Unit Kompetensi</label> <button class="btn btn-primary" id="addButton">+ </button>
                      </div>
                      <div class="col-md-6 mb-3">
                         <div class="form-group">
                            <input type="text" value="{{ old('kode_unit') }}" placeholder="Kode Unit" name="unit_1[kode_unit]" class="form-control bg-white @error('kode_unit') is-invalid @enderror" id="validationCustomUsername" aria-label="Username" aria-describedby="basic-addon1" required>
                         </div>
                      </div>
                      <div class="col-md-6 mb-3">
                        <div class="form-group">
                           <input type="text" value="{{ old('kuk') }}" placeholder="Judul Unit" name="unit_1[kuk]" class="form-control bg-white @error('kuk') is-invalid @enderror" id="validationCustomUsername" aria-label="Username" aria-describedby="basic-addon1" required>
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

<script>
    let inputCounter = 2

    document.getElementById('addButton').addEventListener('click', function() {
        // Buat elemen input baru
        const rowKode = document.createElement('div');
        rowKode.classList.add('col-md-6');
        rowKode.classList.add('mb-3');

        const rowInput = document.createElement('div');
        rowInput.classList.add('col-md-6');
        rowInput.classList.add('mb-3');

        const rowDel = document.createElement('div');
        rowDel.classList.add('col-md-12');
        rowDel.classList.add('mb-3');

        var newInput = document.createElement('input')
        newInput.classList.add('form-control')
        newInput.classList.add('bg-white')
        newInput.type = 'text'
        newInput.name = 'unit_' +inputCounter+ '[kuk]'
        newInput.required = true
        newInput.placeholder = 'Judul Unit ' + inputCounter

        var newKode = document.createElement('input')
        newKode.classList.add('form-control')
        newKode.classList.add('bg-white')
        newKode.type = 'text'
        newKode.name = 'unit_' +inputCounter+ '[kode_unit]'
        newKode.required = true
        newKode.placeholder = 'Kode Unit ' + inputCounter

        const removeButton = document.createElement('button')
        removeButton.type = 'button'
        removeButton.classList.add('btn')
        removeButton.classList.add('btn-danger')
        removeButton.textContent = 'Hapus'
        removeButton.onclick = function() {
            removeQuestion(removeButton, newKode, newInput)
        }

        newInput.classList.add('space')

        // Tambahkan input baru ke dalam container
        var inputContainer = document.getElementById('rowForm')
        console.log(inputContainer)
        rowKode.appendChild(newKode)
        rowInput.appendChild(newInput)
        rowDel.appendChild(removeButton)

        // Tambahkan input baru ke dalam container
        inputContainer.appendChild(rowKode)
        inputContainer.appendChild(rowInput)
        inputContainer.appendChild(rowDel)

        inputCounter++
    })

    function removeQuestion(button, kode, input) {
        const questionDiv = button.parentElement
        const kodeDiv = kode.parentElement
        const inputDiv = input.parentElement
        questionDiv.remove()
        kodeDiv.remove()
        inputDiv.remove()
    }
</script>
@endsection
