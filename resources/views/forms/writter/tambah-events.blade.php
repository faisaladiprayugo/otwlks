@include('includes.admin.header-writter')
@include('includes.admin.navbar-writter')

<div class="container pt-50 mb-20 mt-50">
    <div class="row mb-20">
        <div class="col-md-6">
            <h1 class="color-green bold">Tambah Events</h1>
        </div>
    </div>
</div>

<div class="container mb-50 mt-20">
@if($errors -> any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $e)
                <li>
                    {{$e}}
                </li>
            @endforeach
        </ul>
    </div>
@endif
<form action="/writter/store-events" method="post">
{{ csrf_field() }}
    <div class="row mb-20">
        <div class="col-md-3">
            <span>Judul</span>
        </div>
        <div class="col-md-6">
            <input type="text" class="form-control" name="judul">
        </div>
    </div>
    <div class="row mb-20">
        <div class="col-md-3">
            <span>Tanggal</span>
        </div>
        <div class="col-md-6">
            <input type="date" class="form-control" name="tanggal">
        </div>
    </div>
    <div class="row mb-20">
        <div class="col-md-3">
            <span>Jam</span>
        </div>
        <div class="col-md-6">
            <input type="time" class="form-control" name="jam">
        </div>
    </div>
    <div class="row mb-20">
        <div class="col-md-3">
            <span>Tempat</span>
        </div>
        <div class="col-md-6">
            <input type="text" class="form-control" name="tempat">
        </div>
    </div>
    <div class="row mb-20">
        <div class="col-md-3">
            <span>Author</span>
        </div>
        <div class="col-md-6">
            <input type="text" class="form-control" name="author">
        </div>
    </div>
    <div class="row mb-20">
        <div class="col-md-3">
            <span>Kontak</span>
        </div>
        <div class="col-md-6">
            <input type="number" class="form-control" name="kontak">
        </div>
    </div>
    <div class="row mb-20">
        <div class="col-md-3">
            <span>Deskripsi</span>
        </div>
        <div class="col-md-6">
            <textarea type="text" class="form-control" name="deskripsi" rows="4"></textarea>
        </div>
    </div>
    <div class="row mb-20 text-center">
        <div class="col-md-2 mb-20">
            <a class="btn btn-warning btn-login" href="/writter/manage-news">Cancel</a>
        </div>
        <div class="col-md-2">
            <button class="btn btn-success btn-login" type="submit">Submit</button>
        </div>
    </div>
</form>
</div>

@include('includes.admin.footer')
