@include('includes.admin.header-admin')
@include('includes.admin.navbar-admin')

<div class="container pt-50 mb-20 mt-50">
    <div class="row mb-20">
        <div class="col-md-6">
            <h1 class="color-green bold">Manage Writter</h1>
        </div>
    </div>
    <div class="row mb-20">
        <div class="col-md-4">
            <a class="btn btn-success" href="/admin/tambah-writter">Tambah Writter</a>
        </div>
    </div>
</div>

<div class="container mb-50">
    <div class="row">
        <div class="table-responsive">
            <table class="table">
                <thead class="bold">
                    <td>ID</td>
                    <td>Username</td>
                    <td>Password</td>
                    <td>Manage</td>
                </thead>
                <tbody>
                    @foreach($writter as $w)
                    <tr>
                        <td>{{$w->id_user}}</td>
                        <td>{{$w->username}}</td>
                        <td>{{$w->password}}</td>
                        <td>
                            <a class="btn btn-warning btn-in-table" href="/admin/edit-writter/{{$w->id_user}}">Edit</a>
                            <a class="btn btn-danger btn-in-table" href="/admin/hapus-writter/{{$w->id_user}}">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('includes.admin.footer')
