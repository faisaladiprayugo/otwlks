@include('includes.admin.header-admin')
@include('includes.admin.navbar-admin')

<div class="container pt-50 mb-20 mt-50">
    <div class="row mb-20">
        <div class="col-md-6">
            <h1 class="color-green bold">Edit About</h1>
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
<form action="/admin/edited-about" method="post">
{{ csrf_field() }}
    <div class="row mb-20">
        <div class="col-md-3">
            <span>Judul</span>
        </div>
        <div class="col-md-6">
            <input class="form-control" name="judul" type="text" value="{{$about->judul}}">
        </div>
    </div>
    <div class="row mb-20">
        <div class="col-md-3">
            <span>Deskripsi</span>
        </div>
        <div class="col-md-6">
            <input class="form-control" name="sub_judul" type="text" value="{{$about->sub_judul}}">
        </div>
    </div>
    <div class="row mb-20 text-center">
        <div class="col-md-2 mb-20">
            <a class="btn btn-warning btn-login" href="/admin/manage-about">Cancel</a>
        </div>
        <div class="col-md-2">
            <button class="btn btn-success btn-login" type="submit">Submit</button>
        </div>
    </div>
</form>
</div>

@include('includes.admin.footer')
