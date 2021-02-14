@include('includes.admin.header-writter')
@include('includes.admin.navbar-writter')

<div class="container pt-50 mb-20 mt-50">
    <div class="row mb-20">
        <div class="col-md-6">
            <h1 class="color-green bold">Manage News</h1>
        </div>
    </div>
    <div class="row mb-20">
        <div class="col-md-4">
            <a class="btn btn-success" href="/writter/tambah-news">Tambah News</a>
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
                    <td>Foto</td>
                    <td>Kategori</td>
                    <td>Manage</td>
                </thead>
                <tbody>
                    @foreach($news as $n)
                    <tr>
                        <td>{{$n->judul}}</td>
                        <td><img src="/uploads/news/{{$n->foto}}" style="max-width: 200px;"></td>
                        <td>{{$n->tanggal}}</td>
                        <td>{{$n->kategori}}</td>
                        <td>
                            <a class="btn btn-warning btn-in-table" href="/writter/edit-news/{{$n->id_news}}">Edit</a>
                            <a class="btn btn-danger btn-in-table" href="/writter/hapus-news/{{$n->id_news}}">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('includes.admin.footer')
