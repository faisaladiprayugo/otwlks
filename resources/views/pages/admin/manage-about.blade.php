@include('includes.admin.header-admin')
@include('includes.admin.navbar-admin')

<div class="container pt-50 mb-20 mt-50">
    <div class="row mb-20">
        <div class="col-md-6">
            <h1 class="color-green bold">Manage About</h1>
        </div>
    </div>
</div>

<div class="container mb-20">
    <div class="row">
        <div class="table-responsive">
            <table class="table">
                <thead class="bold">
                    <td>Judul</td>
                    <td>Subjudul</td>
                    <td>Manage</td>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$about->judul}}</td>
                        <td>{{$about->sub_judul}}</td>
                        <td>
                            <a class="btn btn-warning btn-in-table" href="/admin/edit-about">Edit</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container mb-20 mt-50">
    <div class="row mb-20">
        <div class="col-md-6">
            <h3 class="color-green bold">Deskripsi About</h3>
        </div>
    </div>
    <div class="row mb-20">
        <div class="col-md-4">
            <a class="btn btn-success" href="/admin/tambah-sub-about">Tambah Deskripsi About</a>
        </div>
    </div>
    </div>
</div>

<div class="container mb-50">
    <div class="row">
        <div class="table-responsive">
            <table class="table">
                <thead class="bold">
                    <td>ID</td>
                    <td>Deskripsi</td>
                    <td>Manage</td>
                </thead>
                <tbody>
                    @foreach($sub_about as $sb)
                    <tr>
                        <td>{{$sb->id_subkonten}}</td>
                        <td>{{$sb->deskripsi}}</td>
                        <td>
                            <a class="btn btn-warning btn-in-table" href="/admin/edit-sub-about/{{$sb->id_subkonten}}">Edit</a>
                            <a class="btn btn-danger btn-in-table" href="/admin/hapus-sub-about/{{$sb->id_subkonten}}">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('includes.admin.footer')