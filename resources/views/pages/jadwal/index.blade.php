@extends('templates.main')
@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-0">
    @can('asesor')
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="card-title mb-0">
                            <h4 class="mb-0">Calender</h4>
                        </div>
                        <div class="card-action">
                            <a href="#" class="btn btn-primary" role="button">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card  ">
                            <div class="card-body">
                                <div id="calendar1" class="calendar-s"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan

    @can('admin')
    <div class="row">
        <div class="col-sm-12">
           <div class="card">
              <div class="card-header d-flex justify-content-between">
                 <div class="header-title d-flex justify-content-between w-100">

                   <a href="{{ route('schedule.create') }}" class="btn btn-primary">
                      + Tambah Data Jadwal
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
                            <th>Nama</th>
                            <th>Asesor</th>
                            <th>Skema Sertifikasi</th>
                            <th>TUK</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                          </tr>
                       </thead>
                       <tbody>
                        @foreach ($schedule as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->judul }}</td>
                            <td>{{ $row->asessor->nama }} ({{ json_decode($row->asessor->profil)->no_registrasi }})</td>
                            <td>{{ $row->schema->judul_unit }}</td>
                            <td>{{ $row->TUK }}</td>
                            <td>{{ $row->timeline_start }} s/d {{ $row->timeline_end }}</td>
                            <td>
                                <form action="{{ route('schedule.destroy', $row->id) }}" method="post">
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
    @endcan
  </div>

<!-- Fullcalender CSS -->
<link rel='stylesheet' href='../../assets/vendor/fullcalendar/core/main.css' />
<link rel='stylesheet' href='../../assets/vendor/fullcalendar/daygrid/main.css' />
<link rel='stylesheet' href='../../assets/vendor/fullcalendar/timegrid/main.css' />
<link rel='stylesheet' href='../../assets/vendor/fullcalendar/list/main.css' />

<!-- Fullcalender Javascript -->
<script src='../../assets/vendor/fullcalendar/core/main.js'></script>
<script src='../../assets/vendor/fullcalendar/daygrid/main.js'></script>
<script src='../../assets/vendor/fullcalendar/timegrid/main.js'></script>
<script src='../../assets/vendor/fullcalendar/list/main.js'></script>
<script src='../../assets/vendor/fullcalendar/interaction/main.js'></script>
<script src='../../assets/vendor/moment.min.js'></script>
<script type="module">
if (document.querySelectorAll('#calendar1').length) {
  document.addEventListener('DOMContentLoaded', function () {
    let calendarEl = document.getElementById('calendar1');
    let calendar1 = new FullCalendar.Calendar(calendarEl, {
      selectable: true,
      plugins: ["timeGrid", "dayGrid", "list", "interaction"],
      timeZone: "UTC",
      defaultView: "dayGridMonth",
      contentHeight: "auto",
      eventLimit: true,
      dayMaxEvents: 4,
      header: {
          left: "prev,next today",
          center: "title",
          right: "dayGridMonth,timeGridWeek,timeGridDay,listWeek"
      },
      dateClick: function (info) {
          $('#schedule-start-date').val(info.dateStr)
          $('#schedule-end-date').val(info.dateStr)
          $('#date-event').modal('show')
      },
      events: [
        {
            title: 'Click for Google',
            url: 'http://google.com/',
            start: moment(new Date(), 'YYYY-MM-DD').add(-20, 'days').format('YYYY-MM-DD') + 'T05:30:00.000Z',
            backgroundColor: 'rgba(58,87,232,0.2)',
            textColor: 'rgba(58,87,232,1)',
            borderColor: 'rgba(58,87,232,1)'
        },
        {
            title: 'All Day Event',
            start: moment(new Date(), 'YYYY-MM-DD').add(-18, 'days').format('YYYY-MM-DD') + 'T05:30:00.000Z',
            backgroundColor: 'rgba(108,117,125,0.2)',
            textColor: 'rgba(108,117,125,1)',
            borderColor: 'rgba(108,117,125,1)'
        },
        {
            title: 'Long Event',
            start: moment(new Date(), 'YYYY-MM-DD').add(-16, 'days').format('YYYY-MM-DD') + 'T05:30:00.000Z',
            end: moment(new Date(), 'YYYY-MM-DD').add(-13, 'days').format('YYYY-MM-DD') + 'T05:30:00.000Z',
            backgroundColor: 'rgba(8,130,12,0.2)',
            textColor: 'rgba(8,130,12,1)',
            borderColor: 'rgba(8,130,12,1)'
        },
        {
            groupId: '999',
            title: 'Repeating Event',
            start: moment(new Date(), 'YYYY-MM-DD').add(-14, 'days').format('YYYY-MM-DD') + 'T05:30:00.000Z',
            color: '#047685',
            backgroundColor: 'rgba(4,118,133,0.2)',
            textColor: 'rgba(4,118,133,1)',
            borderColor: 'rgba(4,118,133,1)'
        },
        {
            groupId: '999',
            title: 'Repeating Event',
            start: moment(new Date(), 'YYYY-MM-DD').add(-12, 'days').format('YYYY-MM-DD') + 'T05:30:00.000Z',
            backgroundColor: 'rgba(235,153,27,0.2)',
            textColor: 'rgba(235,153,27,1)',
            borderColor: 'rgba(235,153,27,1)'
        },
        {
            groupId: '999',
            title: 'Repeating Event',
            start: moment(new Date(), 'YYYY-MM-DD').add(-10, 'days').format('YYYY-MM-DD') + 'T05:30:00.000Z',
            backgroundColor: 'rgba(206,32,20,0.2)',
            textColor: 'rgba(206,32,20,1)',
            borderColor: 'rgba(206,32,20,1)'
        },
        {
            title: 'Birthday Party',
            start: moment(new Date(), 'YYYY-MM-DD').add(-8, 'days').format('YYYY-MM-DD') + 'T05:30:00.000Z',
            backgroundColor: 'rgba(58,87,232,0.2)',
            textColor: 'rgba(58,87,232,1)',
            borderColor: 'rgba(58,87,232,1)'
        },
        {
            title: 'Meeting',
            start: moment(new Date(), 'YYYY-MM-DD').add(-6, 'days').format('YYYY-MM-DD') + 'T05:30:00.000Z',
            backgroundColor: 'rgba(58,87,232,0.2)',
            textColor: 'rgba(58,87,232,1)',
            borderColor: 'rgba(58,87,232,1)'
        },
        {
            title: 'Birthday Party',
            start: moment(new Date(), 'YYYY-MM-DD').add(-5, 'days').format('YYYY-MM-DD') + 'T05:30:00.000Z',
            backgroundColor: 'rgba(235,153,27,0.2)',
            textColor: 'rgba(235,153,27,1)',
            borderColor: 'rgba(235,153,27,1)'
        },
        {
            title: 'Birthday Party',
            start: moment(new Date(), 'YYYY-MM-DD').add(-2, 'days').format('YYYY-MM-DD') + 'T05:30:00.000Z',
            backgroundColor: 'rgba(235,153,27,0.2)',
            textColor: 'rgba(235,153,27,1)',
            borderColor: 'rgba(235,153,27,1)'
        },

        {
            title: 'Meeting',
            start: moment(new Date(), 'YYYY-MM-DD').add(0, 'days').format('YYYY-MM-DD') + 'T05:30:00.000Z',
            backgroundColor: 'rgba(58,87,232,0.2)',
            textColor: 'rgba(58,87,232,1)',
            borderColor: 'rgba(58,87,232,1)'
        },
        {
            title: 'Click for Google',
            url: 'http://google.com/',
            start: moment(new Date(), 'YYYY-MM-DD').add(0, 'days').format('YYYY-MM-DD') + 'T06:30:00.000Z',
            backgroundColor: 'rgba(58,87,232,0.2)',
            textColor: 'rgba(58,87,232,1)',
            borderColor: 'rgba(58,87,232,1)'
        },
        {
            groupId: '999',
            title: 'Repeating Event',
            start: moment(new Date(), 'YYYY-MM-DD').add(0, 'days').format('YYYY-MM-DD') + 'T07:30:00.000Z',
            backgroundColor: 'rgba(58,87,232,0.2)',
            textColor: 'rgba(58,87,232,1)',
            borderColor: 'rgba(58,87,232,1)'
        },
        {
            title: 'Birthday Party',
            start: moment(new Date(), 'YYYY-MM-DD').add(0, 'days').format('YYYY-MM-DD') + 'T08:30:00.000Z',
            backgroundColor: 'rgba(235,153,27,0.2)',
            textColor: 'rgba(235,153,27,1)',
            borderColor: 'rgba(235,153,27,1)'
        },
        {
            title: 'Doctor Meeting',
            start: moment(new Date(), 'YYYY-MM-DD').add(0, 'days').format('YYYY-MM-DD') + 'T05:30:00.000Z',
            backgroundColor: 'rgba(235,153,27,0.2)',
            textColor: 'rgba(235,153,27,1)',
            borderColor: 'rgba(235,153,27,1)'
        },
        {
            title: 'All Day Event',
            start: moment(new Date(), 'YYYY-MM-DD').add(1, 'days').format('YYYY-MM-DD') + 'T05:30:00.000Z',
            backgroundColor: 'rgba(58,87,232,0.2)',
            textColor: 'rgba(58,87,232,1)',
            borderColor: 'rgba(58,87,232,1)'
        },
        {
            groupId: '999',
            title: 'Repeating Event',
            start: moment(new Date(), 'YYYY-MM-DD').add(8, 'days').format('YYYY-MM-DD') + 'T05:30:00.000Z',
            backgroundColor: 'rgba(58,87,232,0.2)',
            textColor: 'rgba(58,87,232,1)',
            borderColor: 'rgba(58,87,232,1)'
        },
        {
            groupId: '999',
            title: 'Repeating Event',
            start: moment(new Date(), 'YYYY-MM-DD').add(10, 'days').format('YYYY-MM-DD') + 'T05:30:00.000Z',
            backgroundColor: 'rgba(58,87,232,0.2)',
            textColor: 'rgba(58,87,232,1)',
            borderColor: 'rgba(58,87,232,1)'
        }
      ]
  });
  calendar1.render();
  });

}
</script>
@endsection
