@include('includes.admin.header-login')


<div class="container text-center">
<div class="container-login bg-green">

@if($errors -> any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $e)
                <li style="color: black;">
                    {{$e}}
                </li>
            @endforeach
        </ul>
    </div>
@endif
@if(\Session::has('canceled'))
    <div class="alert alert-danger">
        <ul>
            <li style="color: black;">
                {{ Session::get('canceled') }}
            </li>
        </ul>
    </div>
@endif

<form action="/login-admin/store" method="post">
{{ csrf_field() }}
    <div class="row mb-20 justify-center text-center">
        <div class="col-4">
            <h1 style="font-weight: bold;">Login Kingster</h1>
        </div>
    </div>
    <div class="row justify-center mb-20">
        <div class="col-2">
            <span>Username</span>
        </div>
        <div class="col-4">
            <input class="form-control" type="text" name="username">
        </div>
    </div>
    <div class="row justify-center mb-20">
        <div class="col-2">
            <span>Password</span>
        </div>
        <div class="col-4">
            <input class="form-control" type="password" name="password">
        </div>
    </div>
    <div class="row justify-center">
        <div class="col-md-3 mb-20">
            <a class="btn btn-danger btn-login">Reset</a>
        </div>
        <div class="col-md-3">
            <button class="btn btn-warning btn-login" type="submit">Login</button>
        </div>
    </div>
</form>
</div>
</div>