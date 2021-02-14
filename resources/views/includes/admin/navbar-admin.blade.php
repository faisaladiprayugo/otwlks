<div class="container-navbar">
<nav class="navbar navbar-expand-lg navbar-light mr-auto fixed-top shadow-sm w-100 bg-white">
  <a class="navbar-brand col-7 col-xs-6 col-xl-5 col-md-5" href="#">Admin Page</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav navbar-font-style mr-auto ml-auto">
      <li class="nav-item {{ (request()->is('admin/manage-writter')) ? 'navbar-active' : '' }}">
        <a class="nav-link color-dark-blue" href="/admin/manage-writter">Manage Writter <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item {{ (request()->is('admin/headmaster')) ? 'navbar-active' : '' }}">
        <a class="nav-link color-dark-blue" href="/admin/headmaster">Headmaster</a>
      </li>
      <li class="nav-item {{ (request()->is('admin/manage-about')) ? 'navbar-active' : '' }}">
        <a class="nav-link color-dark-blue" href="/admin/manage-about">Manage About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link color-dark-blue" href="/admin/logout">Logout</a>
      </li>
    </ul>
  </div>
</nav>
</div>