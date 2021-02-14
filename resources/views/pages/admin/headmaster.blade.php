@include('includes.admin.header-admin')
@include('includes.admin.navbar-admin')

<div class="container pt-50 mb-20 mt-50">
    <div class="row mb-20">
        <div class="col-md-6">
            <h1 class="color-green bold">Manage Headmaster</h1>
        </div>
    </div>
</div>

<div class="container mb-50">
    <div class="row">
        <div class="table-responsive">
            <table class="table">
                <thead class="bold">
                    <td>Judul</td>
                    <td>Subjudul</td>
                    <td>Foto</td>
                    <td>Deskripsi</td>
                    <td>Manage</td>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$headmaster->judul}}</td>
                        <td>{{$headmaster->sub_judul}}</td>
                        <td><img src="/uploads/headmaster/{{$headmaster->foto}}" style="max-width: 200px;"></td>
                        <td>{{$headmaster->deskripsi}}</td>
                        <td>
                            <a class="btn btn-warning btn-in-table" href="/admin/edit-headmaster">Edit</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('includes.admin.footer')
