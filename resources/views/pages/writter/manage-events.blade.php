@include('includes.admin.header-writter')
@include('includes.admin.navbar-writter')

<div class="container pt-50 mb-20 mt-50">
    <div class="row mb-20">
        <div class="col-md-6">
            <h1 class="color-green bold">Manage Events</h1>
        </div>
    </div>
    <div class="row mb-20">
        <div class="col-md-4">
            <a class="btn btn-success" href="/writter/tambah-events">Tambah Event</a>
        </div>
    </div>
</div>

<div class="container mb-50">
    <div class="row">
        <div class="table-responsive">
            <table class="table">
                <thead class="bold">
                    <td>Judul</td>
                    <td>Tanggal</td>
                    <td>Jam</td>
                    <td>Tempat</td>
                    <td>Status</td>
                    <td>Manage</td>
                </thead>
                <tbody>
                    @foreach($events as $e)
                    <tr>
                        <td>{{$e->judul}}</td>
                        <td>{{$e->tanggal}}</td>
                        <td>{{$e->jam}}</td>
                        <td>{{$e->tempat}}</td>
                        <td>
                            @if(date('Y-m-d') <= $e->tanggal)
                            <a class="btn btn-success btn-in-table" disabled>Upcoming</a>
                            @else
                            <a class="btn btn-danger btn-in-table" disabled>Expired</a>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-warning btn-in-table" href="/writter/edit-events/{{$e->id_events}}">Edit</a>
                            <a class="btn btn-danger btn-in-table" href="/writter/hapus-events/{{$e->id_events}}">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('includes.admin.footer')
