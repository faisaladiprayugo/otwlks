@include('includes.admin.header-writter')
@include('includes.admin.navbar-writter')

<div class="container pt-50 mb-20 mt-50">
    <div class="row mb-20">
        <div class="col-md-6">
            <h1 class="color-green bold">Manage Kategori</h1>
        </div>
    </div>
    <div class="row mb-20">
        <div class="col-md-4">
            <a class="btn btn-success" href="/writter/tambah-kategori">Tambah Kategori</a>
        </div>
    </div>
</div>

<div class="container mb-50">
    <div class="row">
        <div class="table-responsive">
            <table class="table">
                <thead class="bold">
                    <td>ID</td>
                    <td>Nama Kategori</td>
                    <td>Manage</td>
                </thead>
                <tbody>
                    @foreach($kategori as $k)
                    <tr>
                        <td>{{$k->id_kategori}}</td>
                        <td>{{$k->nama}}</td>
                        <td>
                            <a class="btn btn-warning btn-in-table" href="/writter/edit-kategori/{{$k->id_kategori}}">Edit</a>
                            <a class="btn btn-danger btn-in-table" href="/writter/hapus-kategori/{{$k->id_kategori}}">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('includes.admin.footer')
