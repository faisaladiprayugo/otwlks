@include('includes.admin.header-writter')
@include('includes.admin.navbar-writter')

<div class="container pt-50 mb-20 mt-50">
    <div class="row mb-20">
        <div class="col-md-6">
            <h1 class="color-green bold">Edit News</h1>
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
<form action="/writter/edited-news/{{$news->id_news}}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
    <div class="row mb-20">
        <div class="col-md-3">
            <span>Judul</span>
        </div>
        <div class="col-md-6">
            <input type="text" class="form-control" name="judul" value="{{$news->judul}}">
        </div>
    </div>
    <input type="hidden" value="{{$news->kategori}}" id="getKategori">
    <div class="row mb-20">
        <div class="col-md-3">
            <span>Kategori</span>
        </div>
        <div class="col-md-6">
            <select class="form-control" name="kategori" id="kategori">
                @foreach($kategori as $k)
                    @if($news->kategori == $k->nama)
                    <option value="{{$k->nama}}" selected>{{$k->nama}}</option>
                    @else
                    <option value="{{$k->nama}}">{{$k->nama}}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mb-20">
        <div class="col-md-3">
            <span>Tanggal</span>
        </div>
        <div class="col-md-6">
            <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{$news->tanggal}}">
        </div>
    </div>
    <div class="row mb-20">
        <div class="col-md-3">
            <span>Foto</span>
        </div>
        <div class="col-md-6">
            <input type="file" accept="image/*" class="form-control" name="foto">
        </div>
    </div>
    <div class="row mb-20">
        <div class="col-md-3">
            <span>Foto Sebelumnya</span>
        </div>
        <div class="col-md-6">
            <img src="/uploads/news/{{$news->foto}}" style="max-width: 200px;">
        </div>
    </div>
    <div class="row mb-20">
        <div class="col-md-3">
            <span>Deskripsi</span>
        </div>
        <div class="col-md-6">
            <textarea class="form-control" rows="4" name="deskripsi">{{$news->deskripsi}}</textarea>
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
